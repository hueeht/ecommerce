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

Route::get('/', [
    'as' => 'home.index',
    'uses' => 'HomeController@index'
]);

Route::get('/cart', [
    'as' => 'home.index',
    'uses' => 'CartController@show'
]);

Route::get('/products/{id}', [
    'as' => 'home.products.detail',
    'uses' => 'ProductController@getDetail'
]);

Route::post('/carts/add', [
    'as' => 'home.carts.add',
    'uses' => 'CartController@addToCart'
]);

Route::get('/carts', [
    'as' => 'home.carts.index',
    'uses' => 'CartController@index'
]);


