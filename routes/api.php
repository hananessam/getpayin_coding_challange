<?php

use App\Http\Controllers\Api\Platform\PlatformController;
use App\Http\Controllers\Api\Post\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    // Posts API
    Route::group(['prefix' => 'posts'], function () {
        Route::post('/', [PostController::class, 'createPost']);
    });
});

Route::group([], function () {
    Route::get('/platforms', [PlatformController::class, 'platforms']);
});