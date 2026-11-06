<?php

namespace App\Livewire;

use App\Models\Testimonial;
use Livewire\Component;

class Testimonials extends Component
{
    public $activeCategory = 'all';

    // Review submission modal fields
    public $name = '';
    public $role = '';
    public $car_model = '';
    public $category = 'self_drive';
    public $rating = 5;
    public $review = '';
    
    public $showModal = false;
    public $success_message = false;

    protected $rules = [
        'name' => 'required|min:2|max:100',
        'role' => 'nullable|string|max:100',
        'car_model' => 'required|string|max:100',
        'category' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'required|min:10|max:1000',
    ];

    public function setCategory($category)
    {
        $this->activeCategory = $category;
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function setRating($val)
    {
        $this->rating = $val;
    }

    public function submitReview()
    {
        $this->validate();

        Testimonial::create([
            'name' => $this->name,
            'role' => $this->role ?: 'Verified Traveler',
            'car_model' => $this->car_model,
            'category' => $this->category,
            'rating' => $this->rating,
            'review' => $this->review,
            'avatar' => '/images/hero/hero1.png',
            'is_hidden' => false,
        ]);

        $this->reset(['name', 'role', 'car_model', 'category', 'rating', 'review']);
        $this->showModal = false;
        $this->success_message = true;
    }

    public function render()
    {
        $query = Testimonial::where('is_hidden', false);

        if ($this->activeCategory !== 'all') {
            $query->where('category', $this->activeCategory);
        }

        $testimonials = $query->latest()->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'role' => $item->role ?: 'Verified Customer',
                'category' => $item->category ?: 'self_drive',
                'avatar' => $item->avatar ?: '/images/hero/hero1.png',
                'rating' => $item->rating ?: 5,
                'car' => $item->car_model ?: 'Vehicle Rental',
                'date' => $item->created_at ? $item->created_at->diffForHumans() : 'Recent',
                'review' => $item->review,
            ];
        });

        return view('livewire.testimonials', [
            'testimonials' => $testimonials,
        ])->layout('components.layouts.app', ['title' => 'Customer Reviews & Testimonials - Journey Begins']);
    }
}
