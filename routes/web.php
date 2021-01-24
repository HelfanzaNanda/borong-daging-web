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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Home\HomeController@index');
Route::post('/login', 'Auth\LoginController@memberLogin');
Route::post('/register', 'Auth\LoginController@memberRegister');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/product/{slug}', 'Product\ProductController@detail');

Route::post('/cart', 'Cart\CartController@addToCart');