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
