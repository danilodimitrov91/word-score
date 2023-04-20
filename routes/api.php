<?php

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

Route::prefix('v1')->group(function () {
    Route::get('score', [\App\Http\Controllers\Api\v1\WordScoreController::class, 'getScore']);
});

Route::prefix('v2')->group(function () {
    Route::get('score', [\App\Http\Controllers\Api\v2\WordScoreController::class, 'getScore']);
});
