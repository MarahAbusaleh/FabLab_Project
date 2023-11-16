<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    Route::resource('events', EventsController::class);
});



require __DIR__ . '/auth.php';
