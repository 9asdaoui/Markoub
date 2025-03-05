<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all roles
        $adminRole = \App\Models\Role::where('name', 'admin')->first();
        $clientRole = \App\Models\Role::where('name', 'client')->first();
        $companyRole = \App\Models\Role::where('name', 'company')->first();

        // Clear existing role_permission relationships to avoid duplicates
        DB::table('role_permissions')->truncate();
        
        // Get all permissions
        $permissions = DB::table('permissions')->get();
        // Assign all permissions to admin
        foreach ($permissions as $permission) {
            DB::table('role_permissions')->insert([
                'role_id' => $adminRole->id,
                'permission_id' => $permission->id,
            ]);
        }

        // Client permissions
        $clientPermissions = [
            'view_welcome',
            'register_client',
            'register_general',
            'login',
            'logout',
            'view_navettes',
            'search_navettes',
            'view_navette_details'
        ];
        
        $clientPermissionIds = DB::table('permissions')
            ->whereIn('name', $clientPermissions)
            ->pluck('id');
            
        foreach ($clientPermissionIds as $permissionId) {
            DB::table('role_permissions')->insert([
                'role_id' => $clientRole->id,
                'permission_id' => $permissionId,
            ]);
        }

        // Company permissions
        $companyPermissions = [
            'view_welcome',
            'register_company',
            'register_general',
            'login',
            'logout',
            'access_company_dashboard'
        ];
        
        $companyPermissionIds = DB::table('permissions')
            ->whereIn('name', $companyPermissions)
            ->pluck('id');
            
        foreach ($companyPermissionIds as $permissionId) {
            DB::table('role_permissions')->insert([
                'role_id' => $companyRole->id,
                'permission_id' => $permissionId,
            ]);
        }
    }
}