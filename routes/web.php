<?php

use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FeaturesPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoadMapController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomePageController::class, 'home'])->name('home');
Route::get('team', [TeamController::class, 'show'])->name('team');
Route::get('roadmap', [RoadMapController::class, 'show'])->name('roadmap');
Route::get('events', [EventsController::class, 'show'])->name('events');
Route::get('jorover', [FeaturesPageController::class, 'show'])->name('jorover');
Route::get('Showacomponent', [FeaturesPageController::class, 'show'])->name('Showacomponent');
Route::get('component/{id}', [ComponentsController::class, 'show'])->name('component');
Route::get('/get-modal-content/{componentId}', [FeaturesPageController::class, 'getModalContent']);
//Developers
Route::get('showDevelopers', [TeamController::class, 'showDevelopers'])->name('showDevelopers');

