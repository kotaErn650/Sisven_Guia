<?php

use App\Http\Controllers\api\ComunaController;
use App\Http\Controllers\api\MunicipioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Esta es la ruta correcta para acceder a las API

Route::get('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('comunas', ComunaController::class);
Route::get('/comunas', [ComunaController::class, 'index'])->name ('comunas');