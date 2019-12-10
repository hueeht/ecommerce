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
    Route::resource('categories', 'ManageCategoryController', [
        'as' => 'admin',
        'parameters' => ['categories' => 'id']
    ]);
    Route::resource('products', 'ManageProductController', [
        'as' => 'admin',
        'parameters' => ['products' => 'id']
    ]);
    Route::resource('users', 'ManageUserController', [
        'as' => 'admin',
        'parameters' => ['users' => 'id']
    ]);
    Route::resource('orders', 'ManageOrderController', [
        'as' => 'admin',
        'parameters' => ['orders' => 'id']
    ]);
});