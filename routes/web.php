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

Route::post('/product/search', 'Product\ProductController@search')->name('product.search');
Route::get('/product/{slug}', 'Product\ProductController@detail');
Route::get('/category/{slug}', 'Product\ProductController@productsByCategory');

Route::post('/cart', 'Cart\CartController@insertData');
Route::get('/check-cart/{foodId}', 'Cart\CartController@checkCart');
Route::delete('/cart/{id}', 'Cart\CartController@destroy');

Route::get('/checkout', 'Checkout\CheckoutController@index');

Route::post('/delivery_address', 'DeliveryAddress\DeliveryAddressController@insertData');

Route::post('/order', 'Order\OrderController@insertData');
Route::get('/my-orders', 'Order\OrderController@myOrders')->name('myorders');

Route::get('faq', 'Faq\FaqController@index')->name('faq');
