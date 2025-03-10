<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Navette;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Oussama',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            // RoleS::class,
            // tagSeeder::class,
            // UserSeeder::class,
            // CompanySeeder::class,
            PermissionSeeder::class,
            // RolePermissionSeeder::class,
        ]);
        


    }
}
