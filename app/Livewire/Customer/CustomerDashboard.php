<?php

namespace App\Livewire\Customer;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CustomerDashboard extends Component
{
    public function cancelBooking($bookingId)
    {
        $booking = Booking::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->findOrFail($bookingId);

        $booking->update(['status' => 'cancelled']);
        
        session()->flash('message', 'Booking cancelled successfully.');
    }

    public function getWhatsappLink(Booking $booking)
    {
        $message = "Hello Journey Begins, I would like to confirm my car rental booking:\n\n"
                 . "*Car:* {$booking->car->name}\n"
                 . "*Dates:* {$booking->start_date} to {$booking->end_date} ({$booking->duration_days} days)\n"
                 . "*Pickup:* {$booking->pickup_location}\n"
                 . "*Dropoff:* {$booking->dropoff_location}\n"
                 . "*Total Price:* Rs. " . number_format($booking->total_price) . "\n"
                 . "*Name:* {$booking->customer_name}\n"
                 . "*Phone:* {$booking->customer_phone}\n\n"
                 . "Please confirm my reservation. Thank you!";
        
        return 'https://wa.me/' . config('services.whatsapp.number') . '?text=' . urlencode($message);
    }

    public function render()
    {
        $bookings = Booking::with('car')
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.customer.customer-dashboard', [
            'bookings' => $bookings
        ])->layout('components.layouts.app');
    }
}
