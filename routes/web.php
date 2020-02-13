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

// Route::get('/', function () {
//     return view('welcome');
// Route::controller('collection','CollectionController');


// });
Route::get('/','RestaurantController@index')->middleware('auth');

// Route::get('/store','UserController@store');

Route::post('Restaurant', 'RestaurantController@store');
Route::post('/restaurant/{id}', 'RestaurantController@update');


Route::get('/menuItem/view/{id}', 'MenuItemController@view');
Route::get('/menuItem/delete/{id}', 'MenuItemController@delete');
Route::get('/restaurant/delete/{id}', 'RestaurantController@delete');
Route::get('/restaurant/create', 'RestaurantController@create');
Route::get('/restaurant/{id}/edit', 'RestaurantController@edit');
Route::get('/restaurant/index', 'RestaurantController@index');
Route::get('/restaurant/order/{id}', 'RestaurantController@order');
Route::get('/user/order/{id}', 'UserController@order');

Route::get('/cart/add/{id}','CartController@add');
Route::get('/cart/remove/{id}', 'CartController@remove');


Route::get('/order/index','OrderController@index')->name('order.index');
Route::get('/order/show/{id}','OrderController@show')->name('order.show');
Route::get('/order/done/{id}', 'OrderController@done');
Route::get('/order/place/{r_id}','OrderController@place')->name('order.place');




Route::resource('user', 'UserController');
Route::resource('restaurant', 'RestaurantController');
Route::resource('menuItem', 'MenuItemController');




Auth::routes();

Route::get('/home', 'RestaurantController@index')->name('home');
