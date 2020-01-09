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

Route::get('/', 'Client\ProductController@index')->name('home.index');

Route::prefix('carts')->group(function () {
    Route::get('', 'Client\CartController@index')->name('home.carts.index');
    Route::post('/add', 'Client\CartController@add')->name('home.carts.add');
    Route::post('/update', 'Client\CartController@update')->name('home.carts.update');
    Route::post('/delete', 'Client\CartController@delete')->name('home.carts.delete');
    Route::get('/checkout', 'Client\CartController@checkout')->name('home.carts.checkout')->middleware('auth');
    Route::get('/submit', 'Client\CartController@submit')->name('home.carts.submit')->middleware('auth');
});

Route::prefix('products')->group(function (){
    Route::get('/{id}','Client\ProductController@detail')->name('home.products.detail');
    Route::get('/', 'Client\ProductController@index')->name('home.index');
});

Route::prefix('categories')->group(function (){
    Route::get('/{id}','Client\CatgoryController@show')->name('home.categories.show');
});

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function (){
        Route::get('/', 'Client\ProfileController@index')->name('profile');
        Route::get('/edit', 'Client\ProfileController@edit')->name('profile.edit');
        Route::put('/{id}','Client\ProfileController@update')->name('profile.update');
    });

    Route::prefix('orders')->group(function (){
        Route::get('/success','Client\OrderController@success')->name('home.orders.success');
        Route::get('','Client\OrderController@list')->name('home.orders.list')->middleware('auth');
        Route::get('/{id}','Client\OrderController@detail')->name('home.orders.detail');
        Route::get('/{id}/cancel','Client\OrderController@cancel')->name('home.orders.cancel');
    });

    Route::prefix('suggests')->group(function (){
        Route::get('','Client\SuggestController@index')->name('home.suggest');
        Route::post('/submit','Client\SuggestController@submit')->name('home.suggest.submit');
    });

    Route::prefix('rates')->group(function (){
        Route::get('/{id}','Client\RateController@index')->name('home.rate.index');
        Route::post('/{id}','Client\RateController@submit')->name('home.rate.submit');
    });

    Route::get('/send', 'Client\OrderNotificationController@create')->name('send');
    Route::post('/postMessage', 'Client\OrderNotificationController@store')->name('postMessage');
    Route::get('/markAll', 'Client\OrderNotificationController@markAll')->name('markAll');
    Route::get('/mark/{id}', 'Client\OrderNotificationController@mark')->name('mark');
});
