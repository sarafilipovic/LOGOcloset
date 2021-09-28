<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-categories',   [App\Http\Controllers\CategoriesController::class, 'getCategories']);
Route::post('/admin/categories/add-category',  'App\Http\Controllers\Admin\CategoriesController@store');
Route::post('/admin/categories/update-category/{id}',  'App\Http\Controllers\Admin\CategoriesController@update');
Route::delete('/admin/categories/delete-category/{id}',  'App\Http\Controllers\Admin\CategoriesController@destroy');
