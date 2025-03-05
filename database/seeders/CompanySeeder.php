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
        // Get some user IDs to associate with companies
        $userIds = \App\Models\User::pluck('id')->toArray();
        
        if (count($userIds) > 0) {
            \App\Models\Company::create([
            'user_id' => $userIds[0],
            'address' => '123 Main St',
            'city' => 'New York',
            'country' => 'USA',
            'postal_code' => '10001',
            'website' => 'https://acmecorp.com',
            ]);
            
            if (count($userIds) > 1) {
            \App\Models\Company::create([
                'user_id' => $userIds[1],
                'address' => '456 Oak Ave',
                'city' => 'San Francisco',
                'country' => 'USA',
                'postal_code' => '94103',
                'website' => 'https://globexindustries.com',
            ]);
            }
        }
    }
}
