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

Route::group(['middleware' => ['auth', 'checkRole']], function(){
    Route::get('', [
        'as' => 'admin.index',
        'uses' => 'AdminController@index'
    ]);
    Route::resource('categories', 'CategoryController', [
        'as' => 'admin',
    ]);
    Route::resource('products', 'ProductController', [
        'as' => 'admin',
    ]);
    Route::resource('users', 'UserController', [
        'as' => 'admin',
    ]);
    Route::resource('orders', 'OrderController', [
        'as' => 'admin',
    ]);
    Route::get('suggests','SuggestController@index')->name('admin.suggests.index');
    Route::put('suggests/{id}','SuggestController@update')->name('admin.suggests.update');
    Route::get('rates','RateController@index')->name('admin.rates.index');
    Route::put('rates/{id}','RateController@update')->name('admin.rates.update');
    Route::get('notifications', 'NotifyController@readAll')->name('admin.notifications.readAll');
    Route::get('notifications/{id}', 'NotifyController@viewAndRead')->name('admin.notifications.view');
});
