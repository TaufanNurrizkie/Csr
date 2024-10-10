<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\NotificationController;

Route::get('/get-notifications', [NotificationController::class, 'getNotifications']);



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin',
])->group(function () {

    Route::get('/dashboard', App\Livewire\admin\Dashboard\Chart::class)->name('dashboard');

    // Route Report
    Route::get('/reports', App\Livewire\Admin\Reports\Index::class)->name('reports.index');
    Route::get('/reports/{id}',  App\Livewire\Admin\Reports\Show::class)->name('reports.show');
    // Rute untuk aksi laporan
    Route::post('/reports/{id}/approve',  App\Livewire\Admin\Reports\Index::class)->name('reports.approve');
    Route::post('/reports/{id}/reject',  App\Livewire\Admin\Reports\Index::class)->name('reports.reject');
    Route::post('/reports/{id}/suggest',  App\Livewire\Admin\Reports\Index::class)->name('reports.suggest');

    // Route Activity
    Route::get('/activities', App\Livewire\admin\Activities\Index::class)->name('activities.activity');
    Route::get('/activities/create', App\Livewire\admin\Activities\Create::class)->name('activities.create');
    Route::get('/activities/{id}/edit', App\Livewire\admin\Activities\Edit::class)->name('activities.edit');
    Route::get('/activities/{id}', App\Livewire\admin\Activities\Show::class)->name('activities.show');

    //Route Project
    Route::get('/projects', App\Livewire\admin\Projects\Index::class)->name('projects.index');
    Route::get('/projects/create', App\Livewire\admin\Projects\Create::class)->name('projects.create');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::get('/projects/{id}',  App\Livewire\admin\Projects\Show::class)->name('projects.show');
    Route::get('/projects/{id}/publish', [ProjectController::class, 'publish'])->name('projects.publish');


    //Route Sektor
    Route::get('/sektor', App\Livewire\admin\Sektor\Index::class)->name('sektor.index');
    Route::get('/sektor/create', App\Livewire\admin\Sektor\Create::class)->name('sektor.create');
    Route::get('/sektor/{id}', App\Livewire\admin\Sektor\Show::class)->name('sektor.show');
    Route::get('/sektor/edit/{id}',  App\Livewire\admin\Sektor\Edit::class)->name('sektor.edit');

    //Route Mitra
    Route::get('/mitra', App\Livewire\admin\Mitra\Index::class)->name('mitra.index');
    Route::get('/admin/mitra/create', App\Livewire\admin\Mitra\Create::class)->name('mitra.create');
    Route::get('/mitra/{id}/edit', App\Livewire\admin\Mitra\Edit::class)->name('mitra.edit');
    Route::get('/mitra/{id}',  App\Livewire\admin\Mitra\Show::class)->name('mitra.show');
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
       Route::get('/activities/{id}', [ActivityController::class, 'show'])->name('activities.show');

       //Route Project
       Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
       Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
       Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
       Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
       Route::get('/projects/{id}/update', [ProjectController::class, 'update'])->name('projects.update');
       Route::get('projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
       Route::get('/projects/{id}/publish', [ProjectController::class, 'publish'])->name('projects.publish');

      //Route Sektor
      Route::resource('sektor', SectorController::class);

      //Route Mitra
      Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
      Route::get('/mitra/{id}', [MitraController::class, 'show'])->name('mitra.show');
      Route::get('/mitra/{id}/edit', [MitraController::class, 'edit'])->name('mitra.edit');
      Route::put('/mitra/{id}/update', [MitraController::class, 'update'])->name('mitra.update');
      Route::get('/admin/mitra/create', [MitraController::class, 'create'])->name('mitra.create');
      Route::post('/mitra', [MitraController::class, 'store'])->name('mitra.store');
      Route::put('/mitra/{id}/nonaktifkan', [MitraController::class, 'nonaktifkan'])->name('mitra.nonaktifkan');
      Route::put('/mitra/{id}/aktifkan', [MitraController::class, 'aktifkan'])->name('mitra.aktifkan');
      


});

Route::middleware(['auth', 'role:admin|mitra|public'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});




// Route::middleware(['auth', 'role:admin|mitra|public'])->group(function () {
//     Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
// });
