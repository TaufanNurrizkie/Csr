<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ReportController;

Route::post('/reports/{id}/reject', [ReportController::class, 'reject'])->name('reports.reject');
Route::post('/reports/{id}/suggest', [ReportController::class, 'suggest'])->name('reports.suggest');    
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
Route::post('/reports/{id}/approve', [ReportController::class, 'approve'])->name('reports.approve');
Route::post('/reports/{id}/reject', [ReportController::class, 'reject'])->name('reports.reject');

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
