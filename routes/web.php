<?php

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
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'Client\HomeController@index')->name('home.index');

Route::prefix('carts')->group(function () {
    Route::get('', 'Client\CartController@index')->name('home.carts.index');
    Route::post('/add', 'Client\CartController@add')->name('home.carts.add');
    Route::post('/update', 'Client\CartController@update')->name('home.carts.update');
    Route::post('/delete', 'Client\CartController@delete')->name('home.carts.delete');
    Route::get('/checkout', 'Client\CartController@checkout')->name('home.carts.checkout')->middleware('auth');
    Route::get('/submit', 'Client\CartController@submit')->name('home.carts.submit');
});

Route::prefix('products')->group(function (){
    Route::get('/{id}','Client\ProductController@getDetail')->name('home.products.detail');
    Route::get('','Client\ProductController@getList')->name('home.products');
});

Route::prefix('profile')->group(function (){
    Route::get('/', 'Client\ProfileController@index')->name('profile');
    Route::get('/edit', 'Client\ProfileController@edit')->name('profile.edit');
    Route::put('/{id}','Client\ProfileController@update')->name('profile.update');
});

Route::prefix('orders')->group(function (){
    Route::get('/success','Client\OrderController@success')->name('home.orders.success');
    Route::get('/list','Client\OrderController@list')->name('home.orders.list');
    Route::get('/{id}','Client\OrderController@detail')->name('home.orders.detail');
    Route::get('/{id}/cancel','Client\OrderController@cancel')->name('home.orders.cancel');
});
