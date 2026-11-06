<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class Vehicles extends Component
{
    public $search = '';
    public $category = ''; // EV, Petrol, Diesel, or empty for All

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    public function selectCategory($cat)
    {
        $this->category = ($cat === 'All' || $cat === '') ? '' : $cat;
    }

    public function searchFleet()
    {
        // Explicit search trigger action
    }

    public function render()
    {
        $query = Car::with('pricingTier');
        $searchTerm = trim($this->search);

        if ($searchTerm !== '') {
            // Search by car name or category name
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('category', 'like', '%' . $searchTerm . '%');
            });

            // If user selected a specific category tab, refine by category if results exist
            if ($this->category) {
                $categoryMatches = (clone $query)->where('category', $this->category)->exists();
                if ($categoryMatches) {
                    $query->where('category', $this->category);
                }
            }
        } elseif ($this->category) {
            $query->where('category', $this->category);
        }

        // Fetch ALL matching cars
        $cars = $query->orderBy('id', 'asc')->get();

        return view('livewire.vehicles', [
            'cars' => $cars,
        ])->layout('components.layouts.app', ['title' => 'Our Premium Fleet - Journey Begins Car Rental']);
    }
}
