<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ComunaController;
use App\Http\Controllers\Api\MunicipioController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas API para Comunas 
Route::post('/comunas',[ComunaController::class, 'store']-> name('comunas.store'));
Route::get('/comunas',[ComunaController::class, 'index']-> name('comunas'));
Route::delete('/comunas/{comuna}',[ComunaController::class, 'destroy']-> name('comunas.destroy'));
Route::get('/comunas/{comuna}',[ComunaController::class, 'show']-> name('comunas.show'));
Route::put('/comunas/{comuna}',[ComunaController::class, 'update']-> name('comunas.update'));

Route::get('/municipios',[ComunaController::class, 'index']-> name('municipios'));
