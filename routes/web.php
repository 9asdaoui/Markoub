<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavetteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
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
Route::get('/navettes/home', [NavetteController::class, 'index'])->middleware('AuthPermission:view_navettes')->name('navettes.home');

// Route for searching navettes
Route::get('/navettes/search', [NavetteController::class, 'search'])->middleware('AuthPermission:search_navettes')->name('navettes.search');

// Route for displaying a specific navette
Route::get('/navettes/{navette}', [NavetteController::class, 'show'])->middleware('AuthPermission:view_navette_details')->name('navettes.show');



// Admin dashboard
Route::get('/admin/dashboard', [StatisticController::class, 'index'])->middleware('AuthPermission:dashboard')->name('dashboard');

// Role management routes
Route::get('/admin/roles/index', [RoleController::class, 'index'])->middleware('AuthPermission:roles.index')->name('roles.index');

Route::get('/admin/roles/create', [RoleController::class, 'create'])->middleware('AuthPermission:roles.create')->name('roles.create');
Route::post('/admin/roles/store', [RoleController::class, 'store'])->middleware('AuthPermission:roles.store')->name('roles.store');

Route::get('/admin/roles/edit/{role}', [RoleController::class, 'edit'])->middleware('AuthPermission:roles.edit')->name('roles.edit');
Route::put('/admin/roles/update/{role}', [RoleController::class, 'update'])->middleware('AuthPermission:roles.update')->name('roles.update');

Route::delete('/admin/roles/destroy{role}', [RoleController::class, 'destroy'])->middleware('AuthPermission:roles.destroy')->name('roles.destroy');


Route::get('/admin/users/index', [UserController::class, 'index'])->name('users.index');
Route::patch('/admin/users/update-role/{role_id}', [UserController::class, 'update'])->name('admin.users.update-role');
