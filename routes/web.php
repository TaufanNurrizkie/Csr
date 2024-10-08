<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SectorController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin',
])->group(function () {
    Route::get('/dashboard', [ChartController::class, 'index'])->name('dashboard');

       // Route Report
       Route::post('/reports/{id}/reject', [ReportController::class, 'reject'])->name('reports.reject');
       Route::post('/reports/{id}/suggest', [ReportController::class, 'suggest'])->name('reports.suggest');
       Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
       Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
       Route::post('/reports/{id}/approve', [ReportController::class, 'approve'])->name('reports.approve');
   
       // Route Activity
       Route::get('/activities', [ActivityController::class, 'index'])->name('activities.activity');
       Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
       Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');
       Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
       Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');

      //Route Sektor
      Route::resource('sektor', SectorController::class);
});

Route::middleware(['auth', 'role:admin|mitra|public'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});


