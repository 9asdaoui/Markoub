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
            $companyData = $request->validate([
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            ]);
            
            $user->company()->create([
                'user_id' => $user->id,
                'address' => $companyData['address'] ?? null,
                'city' => $companyData['city'] ?? null,
                'country' => $companyData['country'] ?? null,
                'postal_code' => $companyData['postal_code'] ?? null,
                'website' => $companyData['website'] ?? null
            ]);
        }
        
        auth()->login($user);

        if (auth()->user()->role_id === 2) {
            return redirect('/company/dashboard');
        } else if (auth()->user()->role_id === 1) {
            return redirect('/client/home');
        }     
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

            if (auth()->user()->role_id === 3) {
                return redirect('/company/dashboard');
            } else if (auth()->user()->role_id === 2) {
                return redirect('/navettes/home');
            } else if (auth()->user()->role_id === 1) {
                return redirect('/admin/dashboard');   
            }    
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}