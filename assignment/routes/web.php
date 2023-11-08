<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PlantlistController;
use App\Http\Controllers\PlantlistAdminController;
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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/plantlist',[PlantlistController::class,'index']);
Route::post('/plantlist/create',[PlantlistController::class,'store']);
Route::get('/plantlist/{plantlist}/edit',[PlantlistController::class,'edit']) ->name('plantlist.edit');
Route::put('/plantlist/{plantlist}/update',[PlantlistController::class,'update']) ->name('plantlist.update');
Route::delete('/plantlist/{plantlist}/delete', [PlantlistController::class, 'destroy'])->name('plantlist.delete');

//admin
Route::get('/plantlistadmin',[PlantlistAdminController::class,'index']);
Route::post('/plantlistadmin/create',[PlantlistAdminController::class,'store']);
Route::get('/plantlistadmin/{plantlist}/edit',[PlantlistAdminController::class,'edit']) ->name('plantlistadmin.edit');
Route::put('/plantlistadmin/{plantlist}/update',[PlantlistAdminController::class,'update']) ->name('plantlistadmin.update');
Route::delete('/plantlistadmin/{plantlist}/delete', [PlantlistAdminController::class, 'destroy'])->name('plantlistadmin.delete');


