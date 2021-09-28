<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('welcome');

Route::get('/show-products-by-category-id/{id}', [App\Http\Controllers\ProductsController::class, 'getProductsByCategoryId'])->name('products.category.id');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/cart-store', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::delete('/cart-remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart-show', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show');

Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::get('/order-show', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');


Route::prefix('super-admin')->name('super-admin.')->middleware('can:super-admin-routes')->group(function() {
    Route::get('/home', 'App\Http\Controllers\SuperAdmin\HomeController@index')->name('home.index');
    Route::resource('/users', 'App\Http\Controllers\SuperAdmin\UsersController');
});

Route::prefix('admin')->name('admin.')->middleware('can:admin-routes')->group(function() {
    Route::get('/home', 'App\Http\Controllers\Admin\HomeController@index')->name('home.index');
    Route::resource('/categories', 'App\Http\Controllers\Admin\CategoriesController');
    Route::resource('/products', 'App\Http\Controllers\Admin\ProductsController');
});