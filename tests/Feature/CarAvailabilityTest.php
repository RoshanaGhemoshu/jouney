<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarAvailabilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_car_rejects_overlapping_booking_dates(): void
    {
        $car = Car::create([
            'name' => 'Test Car',
            'model_year' => 2026,
            'category' => 'Petrol',
            'transmission' => 'Automatic',
            'seats' => 5,
            'mileage_or_range' => '14.5 km/l',
            'color' => 'White',
            'status' => 'available',
            'image_path' => 'test.jpg',
            'is_featured' => false,
        ]);

        Booking::create([
            'car_id' => $car->id,
            'user_id' => null,
            'customer_name' => 'Jane Doe',
            'customer_email' => 'jane@example.com',
            'customer_phone' => '9800000000',
            'pickup_location' => 'Kathmandu',
            'dropoff_location' => 'Pokhara',
            'start_date' => '2026-09-10',
            'end_date' => '2026-09-15',
            'duration_days' => 6,
            'total_price' => 12000,
            'status' => 'confirmed',
        ]);

        $this->assertFalse($car->isDateRangeAvailable('2026-09-12', '2026-09-14'));
        $this->assertFalse($car->isDateRangeAvailable('2026-09-10', '2026-09-12'));
        $this->assertTrue($car->isDateRangeAvailable('2026-09-16', '2026-09-18'));
    }
}
