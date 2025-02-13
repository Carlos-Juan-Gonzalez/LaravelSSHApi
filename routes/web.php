<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\CarnetController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('conductores', ConductorController::class);
Route::resource('carnet', CarnetController::class);
