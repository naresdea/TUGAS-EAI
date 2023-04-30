<?php

use App\Http\Controllers\API\HotelController;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('hotel',[HotelController::class, 'index']);
Route::post('hotel/store',[HotelController::class, 'store']);
Route::get('hotel/show/{id}',[HotelController::class, 'show']);
Route::post('hotel/update/{id}',[HotelController::class, 'update']);
Route::get('hotel/destroy/{id}',[HotelController::class, 'destroy']);
Route::post('hotel/edit/{id}',[HotelController::class, 'edit']);
Route::post('hotel/check/{id}',[HotelController::class, 'check']);
