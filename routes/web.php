<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\KeuanganController;


Route::get('/', [LandingController::class,'index']) ->name('landing');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Untuk CRUD table Student
    Route::resource('students', StudentController::class);

    Route::resource('keuangans', KeuanganController::class);
}); 