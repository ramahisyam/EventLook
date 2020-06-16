<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create-event', 'CreateEventController@create')->name('create');
Route::post('/create-event', 'CreateEventController@store')->name('store');
Route::get('/', 'EventController@index')->name('index');
Route::get('/edit-event/{event}', 'HomeController@edit')->name('edit');
Route::patch('/edit-event/{event}', 'HomeController@update')->name('update');
Route::delete('/home/{event}', 'HomeController@destroy')->name('destroy');
