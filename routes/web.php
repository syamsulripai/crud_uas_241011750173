<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileAppController;
use App\Http\Controllers\LoginController;

// Halaman Frontend
Route::get('/', [MobileAppController::class, 'frontend'])->name('home');

Route::get('/detail/{mobile}', [MobileAppController::class, 'show'])
    ->name('mobile.show');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');


// Halaman Admin
Route::middleware('auth')->group(function () {

    Route::resource('mobile', MobileAppController::class)
        ->except(['show']);

    Route::get('/export-pdf', [MobileAppController::class, 'exportPdf'])
        ->name('mobile.exportPdf');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});