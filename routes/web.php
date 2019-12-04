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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    'as' => 'client.index',
    'uses' => 'Client\ProductController@index'
]);

Route::get('/detail', [
    'as' => 'client.product.detail',
    'uses' => 'Client\ProductController@getDetail'
]);

Route::prefix('profile')->group(function (){
    Route::get('/', 'Client\ProfileController@index')->name('profile');
    Route::get('/edit', 'Client\ProfileController@edit')->name('profile.edit');
    Route::put('/{id}','Client\ProfileController@update')->name('profile.update');
});

Auth::routes();
