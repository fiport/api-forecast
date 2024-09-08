<?php

use App\Http\Controllers\Address\AddressDeleteController;
use App\Http\Controllers\Weather\WeatherDeleteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressWeather\AddressWeatherListController;
use App\Http\Controllers\AddressWeather\AddressWeatherCreateController;
use App\Http\Controllers\AddressWeather\AddressWeatherDeleteController;
use App\Http\Controllers\VersionController;

Route::get('version', VersionController::class);

Route::prefix('v1')->group(function() {
    Route::prefix('address')->group(function() {
        Route::delete('delete/{id}', AddressDeleteController::class);
    });

    Route::prefix('weather')->group(function() {
        Route::delete('delete/{id}', WeatherDeleteController::class);
    });

    Route::prefix('addressWeather')->group(function() {
        Route::get('list', AddressWeatherListController::class);
        Route::post('create', AddressWeatherCreateController::class);
        Route::delete('delete/{id}', AddressWeatherDeleteController::class);
    });
});
