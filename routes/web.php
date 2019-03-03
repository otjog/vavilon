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

Route::get('/', function () {
    return view('index');
});

Route::resource('customers',    'CustomerController',   ['only' => ['store']]);

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::resource('/customers',   'CustomerController',   ['only' => ['index', 'update']]);

    Route::resource('/keys',        'KeyController',        ['only' => ['store', 'update']]);

    Route::resource('/lotteries',   'LotteryController',    ['only' => ['index', 'update']]);

    Route::resource('/tasks',       'TaskController',       ['only' => ['index', 'create', 'store']]);
});