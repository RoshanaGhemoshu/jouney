<?php

namespace App\Livewire;

use App\Models\Inquiry;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Services extends Component
{
    // Inquiry form fields
    public $service_type = 'General Inquiry';
    public $contact_name = '';
    public $contact_email = '';
    public $contact_phone = '';
    public $contact_message = '';
    public $inquiry_success = false;

    // List of premium services offered
    public $services = [];

    protected $rules = [
        'service_type' => 'required|string|max:100',
        'contact_name' => 'required|min:2|max:100',
        'contact_email' => 'required|email|max:100',
        'contact_phone' => 'required|min:5|max:20',
        'contact_message' => 'required|min:5|max:1000',
    ];

    public function mount()
    {
        // Query param to auto-select a service type
        $selected = request()->query('type');
        if ($selected) {
            $this->service_type = urldecode($selected);
        }

        // Initialize comprehensive services data
        $this->services = [
            [
                'id' => 'wedding_decoration',
                'title' => 'Wedding Car Decoration',
                'category' => 'Special Occasions',
                'icon' => 'heart',
                'badge' => 'Special',
                'description' => 'Complete high-end wedding convoy decoration featuring fresh or artificial floral decor, custom ribbon color palettes tailored to your theme.',
                'features' => ['Fresh/Silk flower options', 'Professional ribbon styling', 'Doorstep setup service'],
            ],
            [
                'id' => 'sightseeing_tours',
                'title' => 'Sightseeing & Tour Packages',
                'category' => 'Travel & Tours',
                'icon' => 'map-pin',
                'badge' => 'Popular',
                'description' => 'Booked tour across Kathmandu, Pokhara, Chitwan, and Lumbini with custom itineraries and professional drivers.',
                'features' => ['Tailored multi-day plans', '24/7 Sedan/Fleet choice', 'Flexible sightseeing stops'],
            ],
            [
                'id' => 'vip_convoy',
                'title' => 'VIP & Diplomatic Convoy',
                'category' => 'Executive Services',
                'icon' => 'shield',
                'badge' => 'Elite',
                'description' => 'Premium security vehicle fleet for luxury travel led and accompanied by professional protocol-trained chauffeurs.',
                'features' => ['Trained defense drivers', 'Convoy coordination', '24/7 backup availability'],
            ],
            [
                'id' => 'self_drive',
                'title' => 'Self Drive Car Rental',
                'category' => 'General Rentals',
                'icon' => 'steering-wheel',
                'badge' => 'Freedom',
                'description' => 'Take the wheel and explore Nepal at your own pace. Choose from hatchback models, robust SUVs, or cutting-edge EVs.',
                'features' => ['Zero deposit booking', 'Comprehensive insurance', 'No hidden mileage limits'],
            ],
            [
                'id' => 'car_with_driver',
                'title' => 'Car With Professional Driver',
                'category' => 'General Rentals',
                'icon' => 'user-check',
                'badge' => 'Recommended',
                'description' => 'Enjoy your journey from the comfort of the backseat with our licensed, polite, and fluent drivers.',
                'features' => ['Local route specialists', 'Fluent English drivers', 'Punctual door-to-door service'],
            ],
            [
                'id' => 'corporate_logistics',
                'title' => 'Corporate Logistics',
                'category' => 'Executive Services',
                'icon' => 'briefcase',
                'badge' => 'Corporate',
                'description' => 'Tailored monthly and annual leasing solutions for NGOs, embassies, and corporate organizations with dedicated fleets.',
                'features' => ['Custom monthly invoicing', 'Dedicated account manager', 'Substitute vehicle guarantee'],
            ],
            [
                'id' => 'airport_transfers',
                'title' => 'Airport Pick & Drop Transfers',
                'category' => 'Travel & Tours',
                'icon' => 'plane',
                'badge' => 'Seamless',
                'description' => 'Punctual TIA Kathmandu and Pokhara airport transfer services with 24/7 flight delay tracking and luggage assistance.',
                'features' => ['Flight time tracking sync', 'Meet & greet terminal service', 'Fixed upfront pricing'],
            ],
            [
                'id' => 'offroad_expeditions',
                'title' => 'Off-Road & Highway Expeditions',
                'category' => 'Travel & Tours',
                'icon' => 'mountain',
                'badge' => 'Adventure',
                'description' => 'High-clearance 4WD Hilux and Mahindra Scorpio vehicles engineered for challenging terrains like Mustang, Manang, and Rara.',
                'features' => ['4WD & All-Terrain ready', 'Off-road experienced drivers', 'All Nepal highway permit support'],
            ],
            [
                'id' => 'event_delegation',
                'title' => 'Event & Conference Shuttles',
                'category' => 'Special Occasions',
                'icon' => 'users',
                'badge' => 'MICE',
                'description' => 'End-to-end transport management for MICE events, corporate seminars, and delegation movement across Nepal.',
                'features' => ['Multi-vehicle fleet dispatch', 'Dedicated ground coordinator', 'Flexible hourly/daily billing'],
            ],
        ];
    }

    public function submitInquiry()
    {
        $this->validate();

        Inquiry::create([
            'name' => $this->contact_name,
            'email' => $this->contact_email,
            'phone' => $this->contact_phone,
            'message' => "[Service Interest: " . $this->service_type . "] " . $this->contact_message,
        ]);

        try {
            $toEmail = env('CONTACT_FORM_TO_ADDRESS', 'rosnaghemoshu18@gmail.com');
            $serviceName = $this->service_type;
            $name = $this->contact_name;
            $email = $this->contact_email;
            $phone = $this->contact_phone;
            $msg = $this->contact_message;

            Mail::raw(
                "New Custom Service Inquiry from Journey Begins Website!\n\n" .
                "Service Type: {$serviceName}\n" .
                "Customer Name: {$name}\n" .
                "Customer Email: {$email}\n" .
                "Customer Phone: {$phone}\n\n" .
                "Message Details:\n{$msg}\n\n" .
                "Submitted At: " . now()->format('Y-m-d H:i:s'),
                function ($mailMessage) use ($toEmail, $serviceName, $name) {
                    $mailMessage->to($toEmail)
                        ->subject("Service Inquiry: {$serviceName} - {$name}");
                }
            );
        } catch (\Throwable $e) {
            Log::error('Service Inquiry Mail dispatch failed: ' . $e->getMessage());
        }

        $this->reset(['contact_name', 'contact_email', 'contact_phone', 'contact_message']);
        $this->inquiry_success = true;
    }

    public function render()
    {
        return view('livewire.services')
            ->layout('components.layouts.app', ['title' => 'Our Services - Journey Begins Car Rental']);
    }
}
