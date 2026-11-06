<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PricingTier extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'daily_rate',
        'weekly_rate',
        'biweekly_rate',
        'monthly_rate',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
