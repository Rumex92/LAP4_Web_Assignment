<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PlantlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Register web routes for the application. These routes are loaded by
| the RouteServiceProvider and assigned to the "web" middleware group.
|
*/

// Default home route
Route::get('/home', function () {
    return view('welcome');
});

// Gallery route
Route::get('/gallery', function () {
    return view('gallery');
});

// Plantlist routes
Route::get('/plantlist', [PlantlistController::class, 'index']);
Route::post('/plantlist/create', [PlantlistController::class, 'store']);
Route::get('/plantlist/{plantlist}/edit', [PlantlistController::class, 'edit'])->name('plantlist.edit');
Route::put('/plantlist/{plantlist}/update', [PlantlistController::class, 'update'])->name('plantlist.update');
Route::delete('/plantlist/{plantlist}/delete', [PlantlistController::class, 'destroy'])->name('plantlist.delete');
