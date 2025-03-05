<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Tag::create(['name' => 'Shuttle']);
        \App\Models\Tag::create(['name' => 'Transport']);
        \App\Models\Tag::create(['name' => 'Travel']);
        \App\Models\Tag::create(['name' => 'Airport']);
        \App\Models\Tag::create(['name' => 'Taxi']);
        \App\Models\Tag::create(['name' => 'Transfer']);
        \App\Models\Tag::create(['name' => 'Booking']);
        \App\Models\Tag::create(['name' => 'Private']);
        \App\Models\Tag::create(['name' => 'Shared']);
    }
}
