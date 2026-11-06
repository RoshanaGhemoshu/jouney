<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model_year',
        'category',
        'transmission',
        'seats',
        'mileage_or_range',
        'color',
        'image_path',
        'status',
        'is_featured',
        'unavailable_dates',
    ];

    protected $casts = [
        'unavailable_dates' => 'array',
    ];

    public function getImageUrlAttribute(): string
    {
        $path = $this->image_path;

        if ($path && preg_match('#^https?://#', $path)) {
            return $path;
        }

        if ($path) {
            foreach (['storage/cars/', 'images/', ''] as $prefix) {
                $candidate = $prefix.ltrim($path, '/');
                if (is_file(public_path($candidate))) {
                    return asset($candidate);
                }
            }
        }

        return asset('images/cars/placeholder.svg');
    }

    public function pricingTier(): HasOne
    {
        return $this->hasOne(PricingTier::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function isDateRangeAvailable(?string $startDate, ?string $endDate): bool
    {
        if (!$startDate || !$endDate) {
            return false;
        }

        $start = Carbon::parse($startDate)->startOfDay();
        $end = Carbon::parse($endDate)->startOfDay();

        if ($end->lessThanOrEqualTo($start)) {
            return false;
        }

        $hasBooking = $this->bookings()
            ->whereNotIn('status', ['cancelled'])
            ->where('end_date', '>=', $start->toDateString())
            ->where('start_date', '<=', $end->toDateString())
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_date', [$start->toDateString(), $end->toDateString()])
                    ->orWhereBetween('end_date', [$start->toDateString(), $end->toDateString()])
                    ->orWhere(function ($q) use ($start, $end) {
                        $q->where('start_date', '<', $start->toDateString())
                            ->where('end_date', '>', $end->toDateString());
                    });
            })
            ->exists();

        if ($hasBooking) {
            return false;
        }

        $manualDates = $this->unavailable_dates ?? [];
        $cursor = $start->copy();
        while ($cursor->lte($end)) {
            if (in_array($cursor->toDateString(), $manualDates)) {
                return false;
            }
            $cursor->addDay();
        }

        return true;
    }

    public function getUnavailableDatesForMonth(?string $month = null): array
    {
        $baseMonth = $month ? Carbon::parse($month) : Carbon::now();
        $monthStart = $baseMonth->copy()->startOfMonth();
        $monthEnd = $baseMonth->copy()->endOfMonth();

        $bookedDates = $this->bookings()
            ->whereNotIn('status', ['cancelled'])
            ->where('end_date', '>=', $monthStart->toDateString())
            ->where('start_date', '<=', $monthEnd->toDateString())
            ->get(['start_date', 'end_date']);

        $unavailable = [];

        foreach ($bookedDates as $booking) {
            $cursor = Carbon::parse($booking->start_date)->startOfDay();
            $finish = Carbon::parse($booking->end_date)->startOfDay();

            while ($cursor->lte($finish)) {
                $unavailable[] = $cursor->toDateString();
                $cursor->addDay();
            }
        }
        $manualDates = $this->unavailable_dates ?? [];
        $unavailable = array_merge($unavailable, $manualDates);

        return array_values(array_unique($unavailable));
    }

    public function getAllUnavailableDates(): array
    {
        $bookedDates = $this->bookings()
            ->whereNotIn('status', ['cancelled'])
            ->where('end_date', '>=', Carbon::now()->toDateString())
            ->get(['start_date', 'end_date']);

        $unavailable = [];

        foreach ($bookedDates as $booking) {
            $cursor = Carbon::parse($booking->start_date)->startOfDay();
            $finish = Carbon::parse($booking->end_date)->startOfDay();

            while ($cursor->lte($finish)) {
                $unavailable[] = $cursor->toDateString();
                $cursor->addDay();
            }
        }

        $manualDates = $this->unavailable_dates ?? [];
        $unavailable = array_merge($unavailable, $manualDates);

        return array_values(array_unique($unavailable));
    }

    public function getAvailabilityCalendarData(?string $month = null): array
    {
        $baseMonth = $month ? Carbon::parse($month) : Carbon::now();
        $monthStart = $baseMonth->copy()->startOfMonth();
        $monthEnd = $baseMonth->copy()->endOfMonth();
        $gridStart = $monthStart->copy()->startOfWeek(Carbon::SUNDAY);
        $gridEnd = $monthEnd->copy()->endOfWeek(Carbon::SATURDAY);

        $unavailable = array_flip($this->getUnavailableDatesForMonth($monthStart->toDateString()));

        $days = [];
        for ($date = $gridStart->copy(); $date->lte($gridEnd); $date->addDay()) {
            $dateString = $date->toDateString();
            $days[] = [
                'date' => $dateString,
                'day' => $date->day,
                'is_current_month' => $date->month === $monthStart->month,
                'is_available' => !isset($unavailable[$dateString]),
                'is_today' => $date->isToday(),
            ];
        }

        return $days;
    }
}
