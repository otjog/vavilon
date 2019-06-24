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

Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@sendMail');

Route::resource('customers',    'CustomerController',   ['only' => ['store']]);

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::resource('/customers',   'CustomerController',   ['only' => ['index', 'update']]);

    Route::resource('/keys',        'KeyController',        ['only' => ['store', 'update']]);

    Route::resource('/lotteries',   'LotteryController',    ['only' => ['index']]);

    Route::resource('/events',      'EventController',      ['only' => ['index', 'update', 'edit', 'create', 'store']]);

    Route::resource('/tasks',       'TaskController',       ['only' => ['index', 'update', 'edit', 'create', 'store']]);

    Route::resource('/news',        'NewsController',       ['only' => ['index', 'update', 'edit', 'create', 'store']]);
});

//Ajax
Route::match(['get', 'post'], '/ajax', 'AjaxController@index');