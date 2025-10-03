<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('home');

Route::middleware('guest')->group(function (): void {
	Route::get('/login', [LoginController::class, 'create'])->name('login');
	Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function (): void {
	Route::view('/dashboard', 'dashboard')->name('dashboard');
	Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
