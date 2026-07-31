<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// CRUD protégé par authentification
Route::resource('products', ProductController::class)->middleware('auth');

// Inscription
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost']);

// Connexion
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost']);

// Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');

// Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');