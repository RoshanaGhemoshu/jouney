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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('model_year');
            $table->string('category'); // EV, Diesel, Petrol
            $table->string('transmission'); // Automatic, Manual
            $table->integer('seats');
            $table->string('mileage_or_range'); // e.g. "450 km" or "16 km/l"
            $table->string('color');
            $table->string('image_path')->nullable();
            $table->string('status')->default('available'); // available, booked, maintenance
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
