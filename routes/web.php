<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::view('/lupa-password', 'auth.forgot-password')->name('password.request');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Placeholder sampai UI dashboard (Admin / Wali Kelas / Kepala Sekolah) dibuat.
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});
