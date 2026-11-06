<?php

use App\Livewire\Home;
use App\Livewire\Vehicles;
use App\Livewire\CarDetails;
use App\Livewire\Services;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Customer\CustomerDashboard;
use App\Livewire\Admin\AdminDashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TikTokAuthController;
use App\Livewire\Contact;
use App\Livewire\Testimonials;

Route::get('/', Home::class)->name('home');
Route::get('/vehicles', Vehicles::class)->name('vehicles.index');
Route::get('/services', Services::class)->name('services');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/testimonials', Testimonials::class)->name('testimonials');
Route::get('/cars/{id}', CarDetails::class)->name('cars.show');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', CustomerDashboard::class)->name('customer.dashboard');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home');
    })->name('logout');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/tiktok/connect', [TikTokAuthController::class, 'redirect'])->name('tiktok.connect');
    Route::get('/tiktok/callback', [TikTokAuthController::class, 'callback'])->name('tiktok.callback');
});
