<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialToken extends Model
{
    protected $fillable = [
        'provider',
        'access_token',
        'refresh_token',
        'open_id',
        'access_token_expires_at',
        'refresh_token_expires_at',
    ];

    protected $casts = [
        'access_token_expires_at' => 'datetime',
        'refresh_token_expires_at' => 'datetime',
    ];

    public function isAccessTokenExpired(): bool
    {
        if (!$this->access_token_expires_at) {
            return true;
        }

        // Treat as expired 5 minutes before actual expiry to be safe
        return now()->addMinutes(5)->greaterThanOrEqualTo($this->access_token_expires_at);
    }
}