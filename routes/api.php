<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\EscapeRoomController;
use App\Http\Controllers\Api\TimeSlotController;
use App\Http\Controllers\Api\TokenController;
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

Route::post("getToken", [TokenController::class, 'getToken'])->name("getToken");

Route::middleware("auth:api")->group(function () {

    Route::get('/escape-rooms', [EscapeRoomController::class, 'index']);//
    Route::get('/escape-rooms/{id}', [EscapeRoomController::class, 'show']);//
    Route::get('/escape-rooms/{id}/time-slots', [TimeSlotController::class, 'index']);//

    Route::post('/bookings', [BookingController::class, "store"]);
    Route::get('/bookings', [BookingController::class, "index"]);
    Route::get('/bookings/{id}', [BookingController::class, "show"]);
    Route::delete('/bookings/{id}', [BookingController::class, "destroy"]);

});
