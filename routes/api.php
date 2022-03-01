<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:borrower_api')->group(function () {
    Route::get('/meta', [\App\Http\Controllers\Api\AppController::class, 'meta']);
    Route::get('/sub-industries', [\App\Http\Controllers\Api\AppController::class, 'subIndustries']);
    Route::get('/business', [\App\Http\Controllers\Api\AppController::class, 'business']);
    Route::post('/business/save', [\App\Http\Controllers\Api\AppController::class, 'saveBusiness']);
    Route::get('/notifications', [\App\Http\Controllers\Api\AppController::class, 'notifications']);

});

Route::middleware('guest:borrower_api')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Api\AppController::class, 'login']);
    Route::get('/register', [\App\Http\Controllers\Api\AppController::class, 'register']);
    Route::get('/verify-email', [\App\Http\Controllers\Api\AppController::class, 'verifyEmail']);
    Route::get('/reset-password', [\App\Http\Controllers\Api\AppController::class, 'resetPassword']);
});
