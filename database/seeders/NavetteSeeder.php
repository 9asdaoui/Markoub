<?php

namespace Database\Seeders;

use App\Models\Navette;
use Illuminate\Database\Seeder;

class NavetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Navette::create([
            'company_id' => 1, // Make sure this company exists
            'departure_city' => 'Casablanca',
            'arrival_city' => 'Rabat',
            'departure_time' => now(),
            'arrival_time' => now()->addHours(1)->addMinutes(30),
            'seats_total' => 30,
            'seats_booked' => 0,
            'description' => 'Express shuttle between Casablanca and Rabat',
            'status' => 'available',
        ]);
        
        Navette::create([
            'company_id' => 1, // Make sure this company exists
            'departure_city' => 'Marrakech',
            'arrival_city' => 'Agadir',
            'departure_time' => now()->addHours(2),
            'arrival_time' => now()->addHours(6),
            'seats_total' => 25,
            'seats_booked' => 5,
            'description' => 'Comfortable shuttle with WiFi',
            'status' => 'available',
        ]);
    }
}
