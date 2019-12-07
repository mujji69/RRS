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
    return view('welcome');Route::get('/owner/register', 'RegController@showform');
    Route::post('/owner/register', 'RegController@register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']],function(){
    
    Route::get('/restaurants', 'RestaurantController@list');


});
Route::get('/owner/register', 'RegController@showform');
Route::post('/owner/register', 'RegController@register');
Route::get('/owner/login', 'LogController@showform');
Route::post('/owner/login', 'LogController@login');
Route::get('/kedit','OwnerController@kedit');
Route::get('/owner', 'OwnerController@index')->name('owner');
Route::get('/owner/bookings/{id}', 'OwnerController@bookings')->name('bookings');
Route::get('/book/{id}','RestaurantController@book');
Route::get('/layout','LayoutController@layout');
Route::post('/reserve/{id}','RestaurantController@reserve');
Route::get('jani','RestaurantController@jani');
Route::post('/destroy/{id}','OwnerController@destroy');

Route::post('chus','RestaurantController@chus');
Route::post('store','OwnerController@storeLayout')->name('store');

Route::get('papi','RestaurantController@papi');

Route::post('total','RestaurantController@total')->name('total');

Route::get('editLayout','OwnerController@editLayout');
Route::post('updateLayout','OwnerController@updateLayout')->name('update');