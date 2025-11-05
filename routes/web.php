<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;

// Registration routes
Route::get('/', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'store'])->name('registration.store');
Route::post('/download', [RegistrationController::class, 'download'])->name('registration.download');

Route::get('/admit-card/view/{registrationId}/{phone}', [RegistrationController::class, 'viewAdmitCard'])
     ->name('admit-card.view');



// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/export/csv', [AdminController::class, 'exportCsv'])->name('admin.export.csv');
    Route::get('/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export.excel');
});