<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;
use App\Models\PricingTier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@journeybegins.com'],
            [
                'name' => 'Journey Admin',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );

        // Truncate tables to re-seed only the correct fleet
        Schema::disableForeignKeyConstraints();
        Car::truncate();
        PricingTier::truncate();
        Schema::enableForeignKeyConstraints();

        // 13 Cars with Tiers based on spreadsheet image
        $carsData = [
            [
                'name' => 'Jaecoo J5 (White)',
                'model_year' => 2025,
                'category' => 'EV',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '400+ km EV',
                'color' => 'White',
                'image_path' => 'jaecoo_j5.jpg',
                'is_featured' => true,
                'pricing' => [
                    'daily_rate' => 9000.00,
                    'weekly_rate' => 7857.14,  // 55k total / 7
                    'biweekly_rate' => 8333.33, // 125k total / 15
                    'monthly_rate' => 6666.67  // 200k total / 30
                ]
            ],
            [
                'name' => 'BYD Atto 3 (Blue/grey/green)',
                'model_year' => 2023,
                'category' => 'EV',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '400+ km EV',
                'color' => 'Blue/Grey/Green',
                'image_path' => 'atto3.jpg',
                'is_featured' => true,
                'pricing' => [
                    'daily_rate' => 8000.00,
                    'weekly_rate' => 7142.86,  // 50k total / 7
                    'biweekly_rate' => 6333.33, // 95k total / 15
                    'monthly_rate' => 6000.00  // 180k total / 30
                ]
            ],
            [
                'name' => 'Deepal S07 (White)',
                'model_year' => 2024,
                'category' => 'EV',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '450+ km EV',
                'color' => 'White',
                'image_path' => 'deepal_s07.jpg',
                'is_featured' => true,
                'pricing' => [
                    'daily_rate' => 12000.00,
                    'weekly_rate' => 10000.00, // 70k total / 7
                    'biweekly_rate' => 8666.67, // 130k total / 15
                    'monthly_rate' => 8000.00  // 240k total / 30
                ]
            ],
            [
                'name' => 'Nami Vigo (White)',
                'model_year' => 2025,
                'category' => 'EV',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '400+ km EV',
                'color' => 'White',
                'image_path' => 'nami_vigo.jpg',
                'is_featured' => false,
                'pricing' => [
                    'daily_rate' => 7500.00,
                    'weekly_rate' => 6428.57,  // 45k total / 7
                    'biweekly_rate' => 5000.00, // 75k total / 15
                    'monthly_rate' => 5666.67  // 170k total / 30
                ]
            ],
            [
                'name' => 'Nami Box (Blue)',
                'model_year' => 2025,
                'category' => 'EV',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '350+ km EV',
                'color' => 'Blue',
                'image_path' => 'nami_box.jpg',
                'is_featured' => false,
                'pricing' => [
                    'daily_rate' => 6500.00,
                    'weekly_rate' => 5714.29,  // 40k total / 7
                    'biweekly_rate' => 5000.00, // 75k total / 15
                    'monthly_rate' => 4833.33  // 145k total / 30
                ]
            ],
            [
                'name' => 'BYD Dolphin (Grey)',
                'model_year' => 2023,
                'category' => 'EV',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '350+ km EV',
                'color' => 'Grey',
                'image_path' => 'byd_dolphin.jpg',
                'is_featured' => true,
                'pricing' => [
                    'daily_rate' => 6500.00,
                    'weekly_rate' => 5714.29,  // 40k total / 7
                    'biweekly_rate' => 5000.00, // 75k total / 15
                    'monthly_rate' => 4833.33  // 145k total / 30
                ]
            ],
            [
                'name' => 'Omoda E5 Pro (Black)',
                'model_year' => 2026,
                'category' => 'EV',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '350+ km EV',
                'color' => 'Black',
                'image_path' => 'omoda_e5.jpg',
                'is_featured' => true,
                'pricing' => [
                    'daily_rate' => 8000.00,
                    'weekly_rate' => 8571.43,  // 60k total / 7
                    'biweekly_rate' => 6333.33, // 95k total / 15
                    'monthly_rate' => 6000.00  // 180k total / 30
                ]
            ],
            [
                'name' => 'Icaur (White)',
                'model_year' => 2026,
                'category' => 'EV',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '400+ km EV',
                'color' => 'White',
                'image_path' => 'icaur.jpg',
                'is_featured' => false,
                'pricing' => [
                    'daily_rate' => 8000.00,
                    'weekly_rate' => 7142.86,  // 50k total / 7
                    'biweekly_rate' => 6333.33, // 95k total / 15
                    'monthly_rate' => 6000.00  // 180k total / 30
                ]
            ],
            [
                'name' => 'Citroen C3 (Grey)',
                'model_year' => 2023,
                'category' => 'EV',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '300 km EV',
                'color' => 'Grey',
                'image_path' => 'citroen_c3.jpg',
                'is_featured' => false,
                'pricing' => [
                    'daily_rate' => 5500.00,
                    'weekly_rate' => 5000.00,  // 35k total / 7
                    'biweekly_rate' => 4333.33, // 65k total / 15
                    'monthly_rate' => 4000.00  // 120k total / 30
                ]
            ],
            [
                'name' => 'Toyota Hilux 4x4 (White)',
                'model_year' => 2020,
                'category' => 'Diesel',
                'transmission' => 'Manual',
                'seats' => 5,
                'mileage_or_range' => '12 km/l Diesel',
                'color' => 'White',
                'image_path' => 'hilux.jpg',
                'is_featured' => true,
                'pricing' => [
                    'daily_rate' => 17000.00,
                    'weekly_rate' => 15714.29, // 110k total / 7
                    'biweekly_rate' => 13333.33,// 200k total / 15
                    'monthly_rate' => 11666.67 // 350k total / 30
                ]
            ],
            [
                'name' => 'Kia Seltos (White)',
                'model_year' => 2021,
                'category' => 'Petrol',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '14 km/l Petrol',
                'color' => 'White',
                'image_path' => 'seltos.jpg',
                'is_featured' => false,
                'pricing' => [
                    'daily_rate' => 6500.00,
                    'weekly_rate' => 5714.29,  // 40k total / 7
                    'biweekly_rate' => 5000.00, // 75k total / 15
                    'monthly_rate' => 4833.33  // 145k total / 30
                ]
            ],
            [
                'name' => 'MG GS (White)',
                'model_year' => 2018,
                'category' => 'Petrol',
                'transmission' => 'Automatic',
                'seats' => 5,
                'mileage_or_range' => '12 km/l Petrol',
                'color' => 'White',
                'image_path' => 'mg_gs.jpg',
                'is_featured' => false,
                'pricing' => [
                    'daily_rate' => 6000.00,
                    'weekly_rate' => 5428.57,  // 38k total / 7
                    'biweekly_rate' => 4666.67, // 70k total / 15
                    'monthly_rate' => 4500.00  // 135k total / 30
                ]
            ],
            [
                'name' => 'Hyundai Verna (Silver)',
                'model_year' => 2014,
                'category' => 'Petrol',
                'transmission' => 'Manual',
                'seats' => 5,
                'mileage_or_range' => '12 km/l Petrol',
                'color' => 'Silver',
                'image_path' => 'verna.jpg',
                'is_featured' => false,
                'pricing' => [
                    'daily_rate' => 5500.00,
                    'weekly_rate' => 5000.00,  // 35k total / 7
                    'biweekly_rate' => 4333.33, // 65k total / 15
                    'monthly_rate' => 4000.00  // 120k total / 30
                ]
            ]
        ];

        foreach ($carsData as $data) {
            $pricing = $data['pricing'];
            unset($data['pricing']);

            $car = Car::updateOrCreate(
                ['name' => $data['name']],
                $data
            );

            PricingTier::updateOrCreate(
                ['car_id' => $car->id],
                $pricing
            );
        }
    }
}
