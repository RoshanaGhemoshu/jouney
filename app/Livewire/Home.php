<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Inquiry;
use Livewire\Component;

use App\Services\SocialMediaService;
use Illuminate\Support\Facades\Log;

class Home extends Component
{
    // Search fields
    public $pickup_location = '';
    public $dropoff_location = '';
    public $pickup_date = '';
    public $return_date = '';
    public $car_type = ''; // Petrol, Diesel, EV, or empty for All

    // Inquiry form fields
    public $contact_name = '';
    public $contact_email = '';
    public $contact_phone = '';
    public $contact_message = '';
    public $inquiry_success = false;

    protected $rules = [
        'contact_name' => 'required|min:3|max:100',
        'contact_email' => 'required|email|max:100',
        'contact_phone' => 'required|min:7|max:15',
        'contact_message' => 'required|min:10|max:1000',
    ];

    public function mount()
    {
        $this->pickup_date = date('Y-m-d', strtotime('+1 day'));
        $this->return_date = date('Y-m-d', strtotime('+3 days'));
    }

    public function submitInquiry()
    {
        $this->validate();

        $inquiry = Inquiry::create([
            'name' => $this->contact_name,
            'email' => $this->contact_email,
            'phone' => $this->contact_phone,
            'message' => $this->contact_message,
        ]);

        try {
            $toEmail = env('CONTACT_FORM_TO_ADDRESS', 'rosnaghemoshu18@gmail.com');
            \Illuminate\Support\Facades\Mail::raw(
                "New Inquiry Received from Journey Begins Website!\n\n" .
                "Name: {$this->contact_name}\n" .
                "Email: {$this->contact_email}\n" .
                "Phone: {$this->contact_phone}\n" .
                "Message:\n{$this->contact_message}\n\n" .
                "Submitted At: " . now()->format('Y-m-d H:i:s'),
                function ($message) use ($toEmail) {
                    $message->to($toEmail)
                        ->subject("New Inquiry: {$this->contact_name}");
                }
            );
        } catch (\Throwable $e) {
            Log::error('Inquiry Mail dispatch failed: ' . $e->getMessage());
        }

        $this->reset(['contact_name', 'contact_email', 'contact_phone', 'contact_message']);
        $this->inquiry_success = true;
    }

    public function render()
    {
        $featuredCars = Car::with('pricingTier')
            ->where('is_featured', true)
            ->get();

        $query = Car::with('pricingTier');

        if ($this->car_type && $this->car_type !== 'All') {
            $query->where('category', $this->car_type);
        }

        $cars = $query->where('status', 'available')
            ->orderBy('id', 'desc')
            ->get();

        $socialService = new SocialMediaService();

        // Each platform is fetched independently so one failing (e.g. TikTok
        // token not yet authorized) doesn't take down Facebook/Instagram too.
        $facebookData = $this->safeFetch(fn () => $socialService->getFacebookData());
        $instagramData = $this->safeFetch(fn () => $socialService->getInstagramData());
        $tikTokData = $this->safeFetch(fn () => $socialService->getTikTokData());

        return view('livewire.home', [
            'featuredCars' => $featuredCars,
            'cars' => $cars,
            'facebookData' => $facebookData,
            'instagramData' => $instagramData,
            'tikTokData' => $tikTokData,
        ])->layout('components.layouts.app');
    }

    /**
     * Returns null (instead of throwing) if a platform's data can't be
     * fetched, so the Blade view can show an honest "unavailable" state
     * for just that one card rather than crashing the page or showing
     * fake numbers.
     */
    protected function safeFetch(\Closure $callback): ?array
    {
        try {
            return $callback();
        } catch (\Throwable $e) {
            Log::error('Social media fetch failed: ' . $e->getMessage());
            return null;
        }
    }
}