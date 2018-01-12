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

Route::get('/', 'CustomersController@index', 'https' => true])->name('customers');
Route::post('/', 'CustomersController@create', 'https' => true]);

Route::get('/home', 'HomeController@index', 'https' => true])->name('home');
Route::get('/home/edit', 'HomeController@edit', 'https' => true])->name('edit');
Route::post('/home/edit', 'HomeController@update', 'https' => true]);

//for debugging
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index', 'https' => true]);
