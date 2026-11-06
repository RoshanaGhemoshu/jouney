<?php

namespace App\Livewire\Admin;

use App\Models\Car;
use App\Models\Booking;
use App\Models\Inquiry;
use App\Models\PricingTier;
use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminDashboard extends Component
{
    use WithFileUploads;

    public $active_tab = 'overview'; // overview, bookings, cars, testimonials, inquiries

    // Car CRUD Form fields
    public $car_id = null;
    public $car_name = '';
    public $car_year = '';
    public $car_category = 'Petrol'; // Petrol, Diesel, EV
    public $car_transmission = 'Manual'; // Manual, Automatic
    public $car_seats = 5;
    public $car_mileage = '';
    public $car_color = '';
    public $car_status = 'available';
    public $car_is_featured = false;
    public $car_image = null; // Uploaded file
    public $car_existing_image = ''; // Existing filename
    public $car_unavailable_dates = ''; // Comma-separated string of dates

    // Rate sheet form fields
    public $rate_daily = 0;
    public $rate_weekly = 0;
    public $rate_biweekly = 0;
    public $rate_monthly = 0;

    // Testimonial Form fields
    public $testi_id = null;
    public $testi_name = '';
    public $testi_role = '';
    public $testi_rating = 5;
    public $testi_car_model = '';
    public $testi_review = '';
    public $show_testi_modal = false;

    // Modals
    public $show_car_modal = false;
    public $selected_inquiry = null;
    public $show_inquiry_modal = false;

    public function mount()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized access.');
        }
        
        $this->car_year = date('Y');
    }

    // --- Booking Management ---
    public function updateBookingStatus($id, $status)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $status]);
        session()->flash('message', "Booking status updated to {$status}.");
    }

    // --- Car Availability & Featured Toggles ---
    public function toggleCarAvailability($id)
    {
        $car = Car::findOrFail($id);
        $car->status = ($car->status === 'available') ? 'booked' : 'available';
        $car->save();
        session()->flash('message', "Vehicle '{$car->name}' status updated to '{$car->status}'.");
    }

    public function toggleCarFeatured($id)
    {
        $car = Car::findOrFail($id);
        $car->is_featured = !$car->is_featured;
        $car->save();
        session()->flash('message', "Vehicle '{$car->name}' featured status updated.");
    }

    // --- Car CRUD Actions ---
    public function openAddCarModal()
    {
        $this->resetCarForm();
        $this->show_car_modal = true;
    }

    public function editCar($id)
    {
        $this->resetCarForm();
        $this->car_id = $id;
        
        $car = Car::with('pricingTier')->findOrFail($id);
        $this->car_name = $car->name;
        $this->car_year = $car->model_year;
        $this->car_category = $car->category;
        $this->car_transmission = $car->transmission;
        $this->car_seats = $car->seats;
        $this->car_mileage = $car->mileage_or_range;
        $this->car_color = $car->color;
        $this->car_status = $car->status;
        $this->car_is_featured = $car->is_featured;
        $this->car_existing_image = $car->image_path;
        $this->car_unavailable_dates = $car->unavailable_dates ? implode(', ', $car->unavailable_dates) : '';

        if ($car->pricingTier) {
            $this->rate_daily = $car->pricingTier->daily_rate;
            $this->rate_weekly = $car->pricingTier->weekly_rate;
            $this->rate_biweekly = $car->pricingTier->biweekly_rate;
            $this->rate_monthly = $car->pricingTier->monthly_rate;
        }

        $this->show_car_modal = true;
    }

    public function saveCar()
    {
        $rules = [
            'car_name' => 'required|min:3|max:100',
            'car_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'car_category' => 'required|in:Petrol,Diesel,EV',
            'car_transmission' => 'required|in:Manual,Automatic',
            'car_seats' => 'required|integer|min:1',
            'car_mileage' => 'required',
            'car_color' => 'required',
            'car_status' => 'required|in:available,booked,maintenance',
            'rate_daily' => 'required|numeric|min:0',
            'rate_weekly' => 'required|numeric|min:0',
            'rate_biweekly' => 'required|numeric|min:0',
            'rate_monthly' => 'required|numeric|min:0',
            'car_unavailable_dates' => 'nullable|string',
        ];

        if ($this->car_image) {
            $rules['car_image'] = 'image|max:2048';
        }

        $this->validate($rules);

        $imagePath = $this->car_existing_image;

        if ($this->car_image) {
            $filename = time() . '_' . $this->car_image->getClientOriginalName();
            $this->car_image->storeAs('cars', $filename, 'public');
            $imagePath = $filename;

            // Ensure uploaded image is accessible on live server without symlink dependencies
            try {
                if (!file_exists(public_path('storage/cars'))) {
                    @mkdir(public_path('storage/cars'), 0755, true);
                }
                if (!file_exists(public_path('images'))) {
                    @mkdir(public_path('images'), 0755, true);
                }
                $storedFile = storage_path('app/public/cars/' . $filename);
                if (file_exists($storedFile)) {
                    @copy($storedFile, public_path('storage/cars/' . $filename));
                    @copy($storedFile, public_path('images/' . $filename));
                }
            } catch (\Throwable $e) {
                Log::warning('Live image copy notice: ' . $e->getMessage());
            }

            if ($this->car_existing_image && Storage::disk('public')->exists('cars/' . $this->car_existing_image)) {
                Storage::disk('public')->delete('cars/' . $this->car_existing_image);
            }
        }

        $car = Car::updateOrCreate(
            ['id' => $this->car_id],
            [
                'name' => $this->car_name,
                'model_year' => $this->car_year,
                'category' => $this->car_category,
                'transmission' => $this->car_transmission,
                'seats' => $this->car_seats,
                'mileage_or_range' => $this->car_mileage,
                'color' => $this->car_color,
                'status' => $this->car_status,
                'image_path' => $imagePath,
                'is_featured' => $this->car_is_featured,
                'unavailable_dates' => $this->car_unavailable_dates ? array_map('trim', explode(',', $this->car_unavailable_dates)) : [],
            ]
        );

        PricingTier::updateOrCreate(
            ['car_id' => $car->id],
            [
                'daily_rate' => $this->rate_daily,
                'weekly_rate' => $this->rate_weekly,
                'biweekly_rate' => $this->rate_biweekly,
                'monthly_rate' => $this->rate_monthly,
            ]
        );

        $this->show_car_modal = false;
        $this->resetCarForm();

        session()->flash('message', $this->car_id ? 'Vehicle and pricing updated successfully.' : 'Vehicle added successfully.');
    }

    public function deleteCar($id)
    {
        $car = Car::findOrFail($id);

        if ($car->image_path && Storage::disk('public')->exists('cars/' . $car->image_path)) {
            Storage::disk('public')->delete('cars/' . $car->image_path);
        }

        $car->delete();
        session()->flash('message', 'Vehicle deleted successfully.');
    }

    public function resetCarForm()
    {
        $this->car_id = null;
        $this->car_name = '';
        $this->car_year = date('Y');
        $this->car_category = 'Petrol';
        $this->car_transmission = 'Manual';
        $this->car_seats = 5;
        $this->car_mileage = '';
        $this->car_color = '';
        $this->car_status = 'available';
        $this->car_is_featured = false;
        $this->car_image = null;
        $this->car_existing_image = '';
        $this->car_unavailable_dates = '';
        $this->rate_daily = 0;
        $this->rate_weekly = 0;
        $this->rate_biweekly = 0;
        $this->rate_monthly = 0;
    }

    // --- Testimonial CRUD Actions ---
    public function toggleHideTestimonial($id)
    {
        $item = Testimonial::findOrFail($id);
        $item->is_hidden = !$item->is_hidden;
        $item->save();
        session()->flash('message', $item->is_hidden ? "Testimonial is now hidden from public site." : "Testimonial is now visible on public site.");
    }

    public function deleteTestimonial($id)
    {
        Testimonial::findOrFail($id)->delete();
        session()->flash('message', 'Testimonial deleted.');
    }

    public function openAddTestimonialModal()
    {
        $this->resetTestiForm();
        $this->show_testi_modal = true;
    }

    public function saveTestimonial()
    {
        $this->validate([
            'testi_name' => 'required|min:2|max:100',
            'testi_review' => 'required|min:5|max:1000',
        ]);

        Testimonial::create([
            'name' => $this->testi_name,
            'role' => $this->testi_role ?: 'Verified Customer',
            'rating' => $this->testi_rating ?: 5,
            'car_model' => $this->testi_car_model ?: 'Car Rental',
            'review' => $this->testi_review,
            'is_hidden' => false,
        ]);

        $this->show_testi_modal = false;
        $this->resetTestiForm();
        session()->flash('message', 'New testimonial added successfully.');
    }

    public function resetTestiForm()
    {
        $this->testi_id = null;
        $this->testi_name = '';
        $this->testi_role = '';
        $this->testi_rating = 5;
        $this->testi_car_model = '';
        $this->testi_review = '';
    }

    // --- Inquiry Actions ---
    public function viewInquiry($id)
    {
        $this->selected_inquiry = Inquiry::findOrFail($id);
        $this->show_inquiry_modal = true;
    }

    public function deleteInquiry($id)
    {
        Inquiry::findOrFail($id)->delete();
        $this->show_inquiry_modal = false;
        session()->flash('message', 'Inquiry message removed.');
    }

    public function render()
    {
        $kpis = [
            'total_cars' => Car::count(),
            'available_cars' => Car::where('status', 'available')->count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'total_earnings' => Booking::where('status', 'confirmed')->sum('total_price'),
            'total_inquiries' => Inquiry::count(),
            'total_testimonials' => Testimonial::count(),
        ];

        $bookings = Booking::with('car')->orderBy('id', 'desc')->get();
        $cars = Car::with('pricingTier')->orderBy('id', 'desc')->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        $inquiries = Inquiry::orderBy('id', 'desc')->get();

        return view('livewire.admin.admin-dashboard', [
            'kpis' => $kpis,
            'bookings' => $bookings,
            'cars' => $cars,
            'testimonials' => $testimonials,
            'inquiries' => $inquiries,
        ])->layout('components.layouts.app', ['title' => 'Admin Dashboard - Journey Begins']);
    }
}
