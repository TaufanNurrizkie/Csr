<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',              
    config('jetstream.auth_session'), 
    'verified',                  
])->group(function () {
    // Rute untuk halaman home
    Route::get('/dashboard', [ChartController::class, 'index'])->name('dashboard');
});
