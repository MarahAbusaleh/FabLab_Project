<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\FeaturesPageController;
use App\Http\Controllers\RoadMapController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
    Route::resource('events', EventsController::class);
    Route::resource('features', FeaturesPageController::class);
    Route::resource('roadmap', RoadMapController::class);
});



require __DIR__ . '/auth.php';
