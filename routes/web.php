<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ReportController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/reports/{id}/reject', [ReportController::class, 'reject'])->name('reports.reject');
    Route::post('/reports/{id}/suggest', [ReportController::class, 'suggest'])->name('reports.suggest');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
    Route::post('/reports/{id}/approve', [ReportController::class, 'approve'])->name('reports.approve');
});
Route::middleware(['auth', 'role:admin|mitra|public'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [ChartController::class, 'index'])->name('dashboard')->middleware('role:admin');
});
