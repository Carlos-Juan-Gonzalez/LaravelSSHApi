<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ConductorController;

// Ruta de ejemplo para obtener el usuario autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas para el CRUD de conductores usando el controlador ConductorController
Route::apiResource('conductores', ConductorController::class); // Usa 'conductores' en plural para seguir la convención RESTful

