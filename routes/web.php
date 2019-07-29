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

Route::get('/', 'PagesController@index');
Route::get('hotels/{placeUrl}', 'PagesController@showHotels');

Route::get('admin', 'AdminController@index');

Route::resource('/places', 'PlacesController');
Route::resource('/hotel', 'HotelController');
Route::resource('/room', 'RoomController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
