<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantlistController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route to get user information
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

 // Plantlist routes
Route::delete("/plantlist/{id}", [PlantlistController::class, 'delete_plantlist']);
Route::patch("/plantlist/{id}", [PlantlistController::class, 'update_plantlist']);
Route::post("/plantlist", [PlantlistController::class, 'create_plantlist']);
Route::get("/plantlist",[PlantlistController::class,'get_plantlist']);

 // Get users and logout route
Route::group(['middleware' => 'jwt'], function () {
   
    Route::post("/plantlist",[PlantlistController::class,'create_plantlist']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/users', [AuthController::class, 'getUsers']);
});

