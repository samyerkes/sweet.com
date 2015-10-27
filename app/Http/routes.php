<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// $user = User::find(10)->role->toArray();
// return $user;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', [
    'as' => 'product.listing', 'uses' => 'ProductController@publicListing'
]);
Route::get('products/{products}', [
    'as' => 'product.item', 'uses' => 'ProductController@publicShow'
]);

// Authentication
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration
Route::get('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function () {

	Route::resource('profile', 'ProfileController');
	Route::group(['middleware' => 'UserInfo'], function() {
	    Route::resource('profile', 'ProfileController', ['only' => ['edit']]);
	});
	Route::group(['middleware' => 'OrderUser'], function() {
	    Route::resource('profile', 'ProfileController', ['only' => ['show']]);
	});

	Route::group(['middleware' => 'admin'], function() {
		Route::get('/admin', ['as' => 'admin', function () {
		    return view('admin.index');
		}]);

		Route::resource('/admin/users', 'UserController');

		Route::resource('admin/products', 'ProductController');

		Route::get('/admin/orders/pending', ['as' => 'admin.orders.pending', 'uses' => 'OrderController@pending']);
		Route::get('/admin/orders/completed', ['as' => 'admin.orders.completed', 'uses' => 'OrderController@completed']);
		Route::resource('/admin/orders', 'OrderController');

	});
	
});
