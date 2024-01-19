<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\MqttController;
use Illuminate\Support\Facades\Route;

Route::post('/publish', [MqttController::class, 'publish']);

Route::group(['prefix' => 'artisan'], function () {
    Route::get('/key', [ArtisanController::class, 'key']);
    Route::get('/seed', [ArtisanController::class, 'seed']);
    Route::get('/fresh', [ArtisanController::class, 'fresh']);
    Route::get('/cache', [ArtisanController::class, 'cache']);
    Route::get('/storage', [ArtisanController::class, 'storage']);
    Route::get('/optimize', [ArtisanController::class, 'optimize']);
});