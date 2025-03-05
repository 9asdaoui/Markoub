<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Create permissions based on routes
            $permissions = [
                // General permissions
                'view_welcome',
                
                // Auth permissions
                'register_client',
                'register_company',
                'register_general',
                'login',
                'logout',
                
                // Navette permissions for clients
                'view_navettes',
                'search_navettes',
                'view_navette_details',
                
                // Company dashboard permissions
                'access_company_dashboard',
            ];
            // Create permissions manually using DB
            foreach ($permissions as $permission) {
                DB::table('permissions')->insert([
                    'name' => $permission,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
}
