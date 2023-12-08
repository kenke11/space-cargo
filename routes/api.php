<?php

use App\Http\Controllers\ParcelController;
use Illuminate\Support\Facades\Route;
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

Route::middleware('log.requests')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(ParcelController::class)->group(function () {
            Route::post('/parcels', 'store');
            Route::put('/parcels/{parcel}', 'update');
        });
    });

    Route::post('/login', [AuthController::class, 'login']);
});

