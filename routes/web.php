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

    Route::group(['middleware' => ['web']], function () {
        Route::get('/users', 'UsersController@usersCrud');
        Route::resource('useritems', 'UsersController');
    });

    Route::group(['middleware' => ['web']], function () {
        Route::get('/', 'LogsController@logsCrud');
        Route::resource('logitems', 'LogsController');
    });

    Route::get('/logout', 'UsersController@logout');


    Auth::routes();

    Route::get('/dashboard', 'HomeController@index');
