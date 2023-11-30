<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FeaturesPageController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\HomeContentController;
use App\Http\Controllers\RoadMapController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    Route::resource('events', EventsController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('features', FeaturesPageController::class);
    Route::resource('roadmap', RoadMapController::class);
    Route::resource('home-page', HomePageController::class);
    Route::resource('components', ComponentsController::class);
    Route::resource('admin-users', UserController::class);
    Route::resource('home-content', HomeContentController::class);
    Route::resource('home-about', HomeAboutController::class);
    Route::resource('contact-info', ContactInfoController::class);

    // profile Routes
    Route::get('/profile', [AdminController::class, 'adminProfile'])->name('profile');
    Route::post('/profile-update/{id}', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::get('/profile/change-password', [AdminController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/profile/update-password/{id}', [AdminController::class, 'updatePassword'])->name('profile.update-password');
});



require __DIR__ . '/auth.php';
