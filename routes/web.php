<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavetteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

// Main landing page route
Route::get('/', function () {
    return view('welcome');
});


// Show the client registration form
Route::get('/register/client', [AuthController::class, 'showRegisterForm'])->name('client.register');
// Process client registration form submission
Route::post('/register/client', [AuthController::class, 'register'])->name('client.register');


// Show the company registration form
Route::get('/register/company', [AuthController::class, 'showRegisterForm'])->name('company.register');
// Process company registration form submission
Route::post('/register/company', [AuthController::class, 'register'])->name('company.register');


// Show the general registration form
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Process general registration form submission
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Show the login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
// Process login attempt
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Log the user out of the application
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




// Home page for client users (role_id = 1)
Route::get('/navettes/home',[NavetteController::class, 'index'] );

// Route for searching navettes
Route::get('/navettes/search', [NavetteController::class, 'search'])->name('navettes.search');

// Route for displaying a specific navette
Route::get('/navettes/{navette}', [NavetteController::class, 'show'])->name('navettes.show');



// Admin dashboard
Route::get('/admin/dashboard', [StatisticController::class, 'index'])->name('dashboard');

Route::get('/admin/roles/index', [RoleController::class, 'index'])->name('roles.index');

Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/admin/roles/store', [RoleController::class, 'store'])->name('roles.store');

Route::get('/admin/roles/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/admin/roles/update', [RoleController::class, 'update'])->name('roles.update');


Route::delete('/admin/roles/destroy{role}', [RoleController::class, 'destroy'])->name('roles.destroy');