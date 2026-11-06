<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Booking;
use App\Models\User;
use App\Notifications\NewBookingNotification;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CarDetails extends Component
{
    public Car $car;

    // Booking Calculator inputs
    public $pickup_location = '';
    public $dropoff_location = '';
    public $pickup_date = '';
    public $return_date = '';

    // Calculation results
    public $duration_days = 0;
    public $applied_rate = 0;
    public $total_price = 0;
    public $rate_tier_name = '';

    // Modal state & client details
    public $show_booking_modal = false;
    public $customer_name = '';
    public $customer_email = '';
    public $customer_phone = '';
    public $booking_success = false;
    public $whatsapp_link = '';
    public $unavailable_dates = [];

    protected $rules = [
        'pickup_location' => 'required|min:3',
        'dropoff_location' => 'required|min:3',
        'pickup_date' => 'required|date|after_or_equal:today',
        'return_date' => 'required|date|after:pickup_date',
        'customer_name' => 'required|min:3',
        'customer_email' => 'required|email',
        'customer_phone' => 'required|min:7',
    ];

    public function mount($id)
    {
        $this->car = Car::with('pricingTier')->findOrFail($id);
        
        $this->pickup_date = date('Y-m-d', strtotime('+1 day'));
        $this->return_date = date('Y-m-d', strtotime('+3 days'));
        
        $this->pickup_location = 'Kathmandu Airport';
        $this->dropoff_location = 'Kathmandu Airport';

        // Prepopulate customer details if logged in
        if (Auth::check()) {
            $user = Auth::user();
            $this->customer_name = $user->name;
            $this->customer_email = $user->email;
        }

        $this->unavailable_dates = $this->car->getAllUnavailableDates();
        $this->calculatePrice();
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['pickup_date', 'return_date'])) {
            $this->validateDateSelection();
            $this->calculatePrice();
        }
    }

    protected function validateDateSelection(): bool
    {
        if (!$this->pickup_date || !$this->return_date) {
            return false;
        }

        if (!$this->car->isDateRangeAvailable($this->pickup_date, $this->return_date)) {
            $this->addError('pickup_date', 'The selected dates are not available for this vehicle. Please choose another range.');
            $this->addError('return_date', 'The selected dates are not available for this vehicle. Please choose another range.');
            return false;
        }

        $this->resetErrorBag(['pickup_date', 'return_date']);
        return true;
    }

    public function calculatePrice()
    {
        if (!$this->pickup_date || !$this->return_date) {
            return;
        }

        $start = strtotime($this->pickup_date);
        $end = strtotime($this->return_date);

        if ($end <= $start) {
            $this->duration_days = 0;
            $this->total_price = 0;
            $this->applied_rate = 0;
            $this->rate_tier_name = 'Invalid dates';
            return;
        }

        $diff = $end - $start;
        $this->duration_days = (int) ceil($diff / (60 * 60 * 24));

        $tiers = $this->car->pricingTier;

        if (! $tiers) {
            $this->applied_rate = 0;
            $this->total_price = 0;
            $this->rate_tier_name = 'Pricing unavailable';
            return;
        }

        if ($this->duration_days >= 30) {
            $this->applied_rate = $tiers->monthly_rate;
            $this->rate_tier_name = 'Monthly Rate';
        } elseif ($this->duration_days >= 15) {
            $this->applied_rate = $tiers->biweekly_rate;
            $this->rate_tier_name = 'Bi-weekly Rate';
        } elseif ($this->duration_days >= 7) {
            $this->applied_rate = $tiers->weekly_rate;
            $this->rate_tier_name = 'Weekly Rate';
        } else {
            $this->applied_rate = $tiers->daily_rate;
            $this->rate_tier_name = 'Daily Rate';
        }

        $this->total_price = $this->duration_days * $this->applied_rate;
    }

    public function openBookingModal()
    {
        $this->validate([
            'pickup_location' => 'required|min:3',
            'dropoff_location' => 'required|min:3',
            'pickup_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:pickup_date',
        ]);

        if (!$this->validateDateSelection()) {
            return;
        }
        
        $this->show_booking_modal = true;
    }

    public function confirmBooking()
    {
        $this->validate();

        if (!$this->validateDateSelection()) {
            return;
        }

        $this->calculatePrice();

        if ($this->total_price <= 0) {
            $this->addError('pickup_date', 'Pricing is unavailable for this vehicle. Please contact us on WhatsApp.');
            return;
        }

        $booking = Booking::create([
            'car_id' => $this->car->id,
            'user_id' => Auth::id(),
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'customer_phone' => $this->customer_phone,
            'pickup_location' => $this->pickup_location,
            'dropoff_location' => $this->dropoff_location,
            'start_date' => $this->pickup_date,
            'end_date' => $this->return_date,
            'duration_days' => $this->duration_days,
            'total_price' => $this->total_price,
            'status' => 'pending',
        ]);

        $admins = User::where('is_admin', true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewBookingNotification($booking));
        }

        // Build dynamic WhatsApp link
        $message = "Hello Journey Begins, I would like to confirm my car rental booking:\n\n"
                 . "*Car:* {$this->car->name} ({$this->car->model_year})\n"
                 . "*Dates:* {$this->pickup_date} to {$this->return_date} ({$this->duration_days} days)\n"
                 . "*Pickup:* {$this->pickup_location}\n"
                 . "*Dropoff:* {$this->dropoff_location}\n"
                 . "*Total Price:* Rs. " . number_format($this->total_price) . "\n"
                 . "*Name:* {$this->customer_name}\n"
                 . "*Phone:* {$this->customer_phone}\n\n"
                 . "Please confirm my reservation. Thank you!";
        
        $this->whatsapp_link = 'https://wa.me/' . config('services.whatsapp.number') . '?text=' . urlencode($message);
        
        $this->booking_success = true;
        $this->show_booking_modal = false;
    }

    public function render()
    {
        return view('livewire.car-details')
            ->layout('components.layouts.app');
    }
}
