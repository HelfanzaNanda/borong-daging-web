<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Home\HomeController@index');
Route::post('/login', 'Auth\LoginController@memberLogin');
Route::post('/register', 'Auth\LoginController@memberRegister');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/product/search/{name}', 'Product\ProductController@search')->name('product.search');
Route::post('/product/autocomplete', 'Product\ProductController@autocomplete')->name('product.autocomplete');
Route::get('/product/{slug}', 'Product\ProductController@detail');
Route::get('/category/{slug}', 'Product\ProductController@productsByCategory');

Route::post('/cart', 'Cart\CartController@insertData');
Route::delete('/cart/{id}', 'Cart\CartController@destroy');

Route::get('/checkout', 'Checkout\CheckoutController@index');

Route::get('/delivery-address', 'DeliveryAddress\DeliveryAddressController@index');
Route::get('/delivery-address/add', 'DeliveryAddress\DeliveryAddressController@create');
Route::get('/delivery-address/{id}/edit', 'DeliveryAddress\DeliveryAddressController@edit');
Route::get('/delivery-address/{id}/pin-point', 'DeliveryAddress\DeliveryAddressController@pinPoint');
Route::get('/delivery-address/{id}/delete', 'DeliveryAddress\DeliveryAddressController@delete');
Route::post('/delivery-address', 'DeliveryAddress\DeliveryAddressController@insertData');
Route::post('/delivery-address-change', 'DeliveryAddress\DeliveryAddressController@change');

Route::get('voucher', 'Voucher\VoucherController@index');

Route::post('/order', 'Order\OrderController@insertData');
Route::get('/my-orders', 'Order\OrderController@myOrders')->name('myorders');

Route::get('faq', 'Faq\FaqController@index')->name('faq');

