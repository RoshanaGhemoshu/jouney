<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['name' => 'Aarav Shrestha', 'role' => 'Business Traveler, Kathmandu', 'car_model' => 'BYD Atto 3', 'category' => 'ev', 'rating' => 5, 'review' => 'Spotless EV, full charge at pickup and a smooth handover at the airport. The weekly rate made a two-week project trip far cheaper than taxis.'],
            ['name' => 'Emily Carter', 'role' => 'Tourist from the UK', 'car_model' => 'Toyota Hilux 4x4', 'category' => 'suv', 'rating' => 5, 'review' => 'We drove to Mustang and back without a single issue. The Hilux handled every rough road, and the team checked in on WhatsApp every day.'],
            ['name' => 'Sita Gurung', 'role' => 'Family Trip, Pokhara', 'car_model' => 'Kia Seltos', 'category' => 'self_drive', 'rating' => 5, 'review' => 'Booking took two minutes and the car was delivered to our hotel. Clean, comfortable and perfect for a family weekend in Pokhara.'],
            ['name' => 'Rajesh Maharjan', 'role' => 'Wedding Convoy, Lalitpur', 'car_model' => 'Deepal S07', 'category' => 'with_driver', 'rating' => 5, 'review' => 'Our wedding convoy was on time, beautifully decorated and the drivers were incredibly professional. Highly recommended.'],
            ['name' => 'Daniel Kim', 'role' => 'Digital Nomad, Thamel', 'car_model' => 'BYD Dolphin', 'category' => 'ev', 'rating' => 4, 'review' => 'Great monthly deal on the Dolphin. They shared a list of charging stations which made exploring the valley stress-free.'],
            ['name' => 'Priya Adhikari', 'role' => 'Corporate Client, Baneshwor', 'car_model' => 'Hyundai Verna', 'category' => 'with_driver', 'rating' => 5, 'review' => 'We use Journey Begins for all our executive airport pickups. Reliable drivers, transparent invoices and quick responses.'],
        ];

        foreach ($testimonials as $data) {
            Testimonial::updateOrCreate(
                ['name' => $data['name'], 'car_model' => $data['car_model']],
                $data + ['avatar' => null, 'is_hidden' => false],
            );
        }
    }
}
