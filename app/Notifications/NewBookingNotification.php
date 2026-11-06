<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookingNotification extends Notification
{
    use Queueable;

    public $booking;

    /**
     * Create a new notification instance.
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Car Booking Received')
            ->greeting('Hello Admin,')
            ->line('A new car booking has been received from ' . $this->booking->customer_name . '.')
            ->line('Car: ' . ($this->booking->car->name ?? 'Unknown'))
            ->line('Dates: ' . $this->booking->start_date . ' to ' . $this->booking->end_date)
            ->line('Total Price: Rs. ' . number_format($this->booking->total_price))
            ->action('View Bookings', url('/admin'))
            ->line('Please review the booking in the admin panel.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'booking_id' => $this->booking->id,
            'message' => 'New booking from ' . $this->booking->customer_name . ' for ' . ($this->booking->car->name ?? 'Unknown'),
            'total_price' => $this->booking->total_price,
            'start_date' => $this->booking->start_date,
        ];
    }
}
