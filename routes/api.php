<?php

use App\Http\Controllers\api\ComunaController;

// Esta es la ruta correcta para acceder a las API
//Route::apiResource('comunas', ComunaController::class);
Route::get('/comunas', [ComunaController::class, 'index'])->name ('comunas');