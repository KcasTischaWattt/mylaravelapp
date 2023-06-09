<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', 'App\Http\Controllers\ProductController');

Route::group(['middleware' => 'auth'], function () {
    Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

    Route::put('cart', [\App\Http\Controllers\CartController::class, 'put'])->name('cart.put');

    Route::delete('cart', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.removeItem');

    //Route::get('cart/create', [\App\Http\Controllers\CartController::class, 'create'])->name('cart.create');

    Route::any('cart/create', [\App\Http\Controllers\CartController::class, 'create'])->name('order.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
