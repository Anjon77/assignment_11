<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;

//Dashboard routes
Route::get('/dashboard', [HomeController::class, 'index']);


//Products Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/update-price', [ProductController::class, 'edit'])->name('products.update-price');
Route::put('/products/{product}', [ProductController::class, 'updatePrice'])->name('products.update');
Route::delete('/products/{product}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');


//Sales Routes
Route::get('/sales-history', [SaleController::class, 'saleHistory'])->name('sales-history');












