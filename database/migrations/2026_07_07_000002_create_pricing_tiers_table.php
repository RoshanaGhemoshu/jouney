<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pricing_tiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->cascadeOnDelete();
            $table->decimal('daily_rate', 10, 2); // 1-6 days rate per day
            $table->decimal('weekly_rate', 10, 2); // 7-14 days rate per day
            $table->decimal('biweekly_rate', 10, 2); // 15-29 days rate per day
            $table->decimal('monthly_rate', 10, 2); // 30+ days rate per day
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_tiers');
    }
};
