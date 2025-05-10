<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\InvoiceController;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', CheckRole::class . ':admin,cliente'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ Rutas protegidas con CheckRole
    Route::get('/products', [ProductController::class, 'index'])
        ->middleware(CheckRole::class . ':admin,vendedor')
        ->name('products.index');

    Route::resource('products', ProductController::class)
        ->middleware(CheckRole::class . ':admin,vendedor');

    Route::get('/customers', [CustomersController::class, 'index'])
        ->middleware(CheckRole::class . ':admin,cliente,vendedor')
        ->name('customers.index');

    Route::resource('customers', CustomersController::class)
        ->middleware(CheckRole::class . ':admin,cliente,vendedor');

    Route::get('/categories', [CategoriesController::class, 'index'])
        ->middleware(CheckRole::class . ':admin')
        ->name('categories.index');

    Route::resource('categories', CategoriesController::class)
        ->middleware(CheckRole::class . ':admin');

    Route::resource('comunas', ComunaController::class);

    Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas.index');

    Route::get('/invoices', [InvoiceController::class, 'index'])
        ->middleware(CheckRole::class . ':admin')
        ->name('invoices.index');

    Route::resource('invoices', InvoiceController::class)
        ->middleware(CheckRole::class . ':admin');
});

require __DIR__.'/auth.php';
