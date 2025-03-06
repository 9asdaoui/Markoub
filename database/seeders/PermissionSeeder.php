<?php

namespace Database\Seeders;

use App\Models\Permission as ModelsPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $excludedRoutes = ['sanctum.csrf-cookie', 'ignition.healthCheck', 'ignition.executeSolution', 'ignition.updateConfig', 'client.register', 'company.register', 'register','login.form','login','logout'];

        $routes = collect(Route::getRoutes())->filter(function ($route) use ($excludedRoutes) {
            return $route->getName() && !in_array($route->getName(), $excludedRoutes);
        });        
        
        $permissions = [];
        
        foreach ($routes as $route) {
            if ($name = $route->getName()) {
                $permissions[] = ['name' => $name];
            }
        }
        
        foreach ($permissions as $perm) {
            Permission::firstOrCreate($perm);
        }
    }
}
