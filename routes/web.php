<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InvoiceController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::resource('categories', CategoriesController::class);
    
    Route::resource('comunas', ComunaController::class);
    
    Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas.index');
    Route::resource('customers',CustomersController::class);
    Route::resource('invoices', InvoiceController::class);

 

    Route::resource('products', ProductController::class);



});

require __DIR__.'/auth.php';
