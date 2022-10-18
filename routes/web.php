<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeshapeController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('/products/{product}/product', [HomeController::class, 'productDetails'])->name('audience.product.show');
Route::get('/caterories/{category}/products', [HomeController::class, 'productList'])->name('audience.products');


// Route::get('/products/{product}', [WelcomeController::class, 'productDetails'])->name('frontend.products.show');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

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


    Route::get('/sizeshape/trash', [SizeshapeController::class, 'trash'])->name('sizeshape.trash');
    Route::get('/sizeshape/{id}/restore', [SizeshapeController::class, 'restore'])->name('sizeshape.restore');
    Route::delete('/sizeshape/{id}/delete', [SizeshapeController::class, 'delete'])->name('sizeshape.delete');
    Route::resource('sizeshape', SizeshapeController::class);
});
