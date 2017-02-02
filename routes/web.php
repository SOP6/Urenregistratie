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
Route::get('/','DashboardController@index');

Route::get('/employee','EmployeeController@index');
Route::get('/project','ProjectController@index');
Route::get('/register','RegisterController@index');
Route::get('/registration','RegistrationController@index');
Route::get('/report','ReportController@index');
Route::get('/profile','ProfileController@index');
