<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Frontend\HomeController;
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

// Route::get('/', function () {
//     // return view('welcome');
//     $viewData = [];
//     $viewData['title'] = "Home Page - Online Shopping";
//     return view('frontend.home.index')->with("viewData",$viewData);
// });

Route::get('/','App\Http\Controllers\Frontend\HomeController@index')->name('index');
Route::get('/about','App\Http\Controllers\Frontend\HomeController@about')->name('about-us');
Route::get('/product','App\Http\Controllers\Frontend\ProductController@index')->name('product.index');
Route::get('/product/{id}','App\Http\Controllers\Frontend\ProductController@show')->name('products.show');
Route::get('/admin','App\Http\Controllers\Backend\AdminHomeController@index')->name('admin.home.index');
Route::get('/admin/products','App\Http\Controllers\Backend\AdminProductController@index')->name('admin.product.index');
Route::post('/admin/products/store','App\Http\Controllers\Backend\AdminProductController@store')->name('admin.product.store');
Route::delete('/admin/products/{id}/delete','App\Http\Controllers\Backend\AdminProductController@delete')->name('admin.product.delete');
Route::get('/admin/products/{id}/edit','App\Http\Controllers\Backend\AdminProductController@edit')->name('admin.product.edit');
Route::put('/admin/products/{id}/update','App\Http\Controllers\Backend\AdminProductController@update')->name('admin.product.update');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
