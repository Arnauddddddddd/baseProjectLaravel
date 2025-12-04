<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ListingController;
use App\Http\Controllers\Api\V1\AuthController;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/listings', [ListingController::class, 'index']);
    Route::post('/listings', [ListingController::class, 'store']);

    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum', 'throttle:api')->group(function() {
        Route::get('/auth/me', [AuthController::class, 'me']);
        Route::post('/auth/logout', [AuthController::class, 'logout']);
    });

});

Route::get("/user", function(Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


