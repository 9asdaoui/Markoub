<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showRegisterForm(Request $request)
    {
        $type = $request->query('type');
        
        if ($type === 'company') {
            return view('auth.company-register');
        } else {
            return view('auth.client-register');
        }
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
            $role_id = 1;
            
        if ($request->query('type') === 'company') {
            $role_id = 2;
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role_id' => $role_id,
            'password' => bcrypt($validatedData['password'])
        ]);

        if ($role_id === 2) {
            $userId = $user->id;
            $user->company()->create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $request->input('phone', ''),
            'user_id' => $userId
            ]);
        }
        
        auth()->login($user);

        return redirect('/dashboard');
    }    
    
    public function showLoginForm()
    {
        return view('auth.login');
    }    
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
