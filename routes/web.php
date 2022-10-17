<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';



Route::get('category/pdf', [CategoryController::class, 'downloadPdf'])->name('category.pdf');
Route::resource('category', CategoryController::class);



Route::get('/product/trash', [ProductController::class, 'trash'])->name('product.trash');
Route::get('/product/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');
Route::delete('/product/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
Route::get('product/pdf', [ProductController::class, 'downloadPdf'])->name('product.pdf');
Route::resource('product', ProductController::class);



Route::get('/color/trash', [ColorController::class, 'trash'])->name('color.trash');
Route::get('/color/{id}/restore', [ColorController::class, 'restore'])->name('color.restore');
Route::delete('/color/{id}/delete', [ColorController::class, 'delete'])->name('color.delete');
Route::resource('color', ColorController::class);
