<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        \App\Models\Company::create([
            'name' => 'Acme Corporation',
            'email' => 'info@acme.com',
            'address' => '123 Main St',
            'phone' => '555-1234',
        ]);
        
        \App\Models\Company::create([
            'name' => 'Globex Industries',
            'email' => 'contact@globex.com',
            'address' => '456 Oak Ave',
            'phone' => '555-5678',
        ]);
    }
}
