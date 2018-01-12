<?php

use App\Customer;

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

Auth::routes();

Route::get('/', 'customersController@index')->name('customers');
Route::post('/', 'CustomersController@create');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/edit', 'HomeController@edit')->name('edit');
Route::post('/home/edit', 'HomeController@update');

//for debugging
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
