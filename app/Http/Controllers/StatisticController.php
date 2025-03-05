<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Navette;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        // Count records for dashboard cards
        $userCount = User::count();
        $navetteCount = Navette::count();
        $roleCount = Role::count();
        $tagCount = Tag::count();
        
        // Get users for the table with pagination
        $users = User::with('role')->latest()->paginate(10);
        
        return view('admin.dashboard', compact(
            'userCount',
            'navetteCount',
            'roleCount',
            'tagCount',
            'users'
        ));
    }
}
