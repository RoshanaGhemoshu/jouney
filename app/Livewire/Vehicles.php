<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class Vehicles extends Component
{
    public $search = '';
    public $category = ''; // EV, Petrol, Diesel, or empty for All
    public $from = '';
    public $to = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'from' => ['except' => ''],
        'to' => ['except' => ''],
    ];

    public function clearDates()
    {
        $this->from = '';
        $this->to = '';
    }

    public function selectCategory($cat)
    {
        $this->category = ($cat === 'All' || $cat === '') ? '' : $cat;
    }

    public function searchFleet()
    {
        // Explicit search trigger action
    }

    protected function hasValidDateRange(): bool
    {
        $from = strtotime((string) $this->from);
        $to = strtotime((string) $this->to);

        return $from !== false && $to !== false && $to > $from;
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

        }

        if ($this->category) {
            $query->where('category', $this->category);
        }

        $cars = $query->orderBy('id', 'asc')->get();

        if ($this->hasValidDateRange()) {
            $cars = $cars->filter(fn (Car $car) => $car->isDateRangeAvailable($this->from, $this->to))->values();
        }

        return view('livewire.vehicles', [
            'cars' => $cars,
            'filteringByDates' => $this->hasValidDateRange(),
        ])->layout('components.layouts.app', ['title' => 'Our Premium Fleet - Journey Begins Car Rental']);
    }
}
