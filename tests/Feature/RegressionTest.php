<?php

namespace Tests\Feature;

use App\Livewire\CarDetails;
use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\Testimonials;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Inquiry;
use App\Models\PricingTier;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;
use Tests\TestCase;

class RegressionTest extends TestCase
{
    use RefreshDatabase;

    private function makeCar(): Car
    {
        $car = Car::create([
            'name' => 'Test Car',
            'model_year' => 2025,
            'category' => 'EV',
            'transmission' => 'Automatic',
            'seats' => 5,
            'mileage_or_range' => '400 km',
            'color' => 'White',
            'image_path' => 'missing.jpg',
            'status' => 'available',
            'is_featured' => true,
        ]);

        PricingTier::create([
            'car_id' => $car->id,
            'daily_rate' => 1000,
            'weekly_rate' => 900,
            'biweekly_rate' => 800,
            'monthly_rate' => 700,
        ]);

        return $car;
    }

    public function test_public_pages_render(): void
    {
        $car = $this->makeCar();

        foreach (['/', '/vehicles', '/services', '/contact', '/testimonials', "/cars/{$car->id}", '/terms', '/privacy', '/login', '/register'] as $url) {
            $this->get($url)->assertOk();
        }
    }

    public function test_review_can_be_submitted_with_category(): void
    {
        Livewire::test(Testimonials::class)
            ->set('name', 'Jane Traveler')
            ->set('role', 'Tourist')
            ->set('car_model', 'BYD Atto 3')
            ->set('category', 'ev')
            ->set('review', 'Excellent car and great service throughout.')
            ->call('submitReview')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('testimonials', ['name' => 'Jane Traveler', 'category' => 'ev']);
    }

    public function test_contact_form_creates_a_single_inquiry(): void
    {
        Mail::fake();

        Livewire::test(Contact::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('phone', '9840000000')
            ->set('message', 'I would like to rent a car next week.')
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertSame(1, Inquiry::count());
    }

    public function test_admin_routes_are_restricted_to_admins(): void
    {
        $customer = User::factory()->create(['is_admin' => false]);
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($customer)->get('/admin')->assertForbidden();
        $this->actingAs($customer)->get('/admin/tiktok/connect')->assertForbidden();
        $this->actingAs($admin)->get('/admin')->assertOk();
    }

    public function test_booking_price_is_recalculated_on_the_server(): void
    {
        Notification::fake();
        $car = $this->makeCar();

        Livewire::test(CarDetails::class, ['id' => $car->id])
            ->set('pickup_date', now()->addDays(2)->toDateString())
            ->set('return_date', now()->addDays(4)->toDateString())
            ->set('total_price', 1)
            ->set('customer_name', 'John Doe')
            ->set('customer_email', 'john@example.com')
            ->set('customer_phone', '9840000000')
            ->call('confirmBooking')
            ->assertHasNoErrors()
            ->assertDispatched('unavailable-dates-updated')
            ->assertSet('unavailable_dates', fn ($dates) => in_array(now()->addDays(3)->toDateString(), $dates, true));

        $this->assertSame(2000.0, (float) Booking::first()->total_price);
    }

    public function test_home_search_redirects_to_filtered_vehicles(): void
    {
        $from = now()->addDay()->toDateString();
        $to = now()->addDays(3)->toDateString();

        Livewire::test(Home::class)
            ->set('car_type', 'EV')
            ->set('pickup_date', $from)
            ->set('return_date', $to)
            ->call('search')
            ->assertRedirect(route('vehicles.index', ['category' => 'EV', 'from' => $from, 'to' => $to]));
    }

    public function test_home_search_shows_error_for_invalid_date_range(): void
    {
        Livewire::test(Home::class)
            ->set('pickup_date', now()->addDays(5)->toDateString())
            ->set('return_date', now()->addDays(2)->toDateString())
            ->call('search')
            ->assertHasErrors(['return_date'])
            ->assertNoRedirect()
            ->assertSee('The return date field must be a date after pickup date.');
    }

    public function test_car_image_url_falls_back_to_placeholder(): void
    {
        $this->assertStringEndsWith('images/cars/placeholder.svg', $this->makeCar()->image_url);
    }
}
