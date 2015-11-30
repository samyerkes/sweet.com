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

Route::get('/', ['as'=>'home', function () {
    return view('welcome');
}]);

Route::get('products/{category?}', [
    'as' => 'product.listing', 'uses' => 'ProductController@publicListing'
]);
Route::get('products/item/{products}', [
    'as' => 'product.item', 'uses' => 'ProductController@publicShow'
]);
Route::get('hours', [
    'as' => 'hours.publicIndex', 'uses' => 'HoursController@publicIndex'
]);

// Authentication
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration
Route::get('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function () {

	Route::get('cart/checkout', [
	    'as' => 'cart.checkout', 'uses' => 'CartController@checkout'
	]);
	Route::put('cart/checkout', [
	    'as' => 'cart.submit', 'uses' => 'CartController@submitOrder'
	]);
	Route::resource('cart', 'CartController');

	Route::resource('profile/address', 'AddressController');
	Route::resource('profile', 'ProfileController');
	Route::group(['middleware' => 'UserInfo'], function() {
	    Route::resource('profile', 'ProfileController', ['only' => ['show', 'edit','update','destroy']]);
	});
	Route::group(['middleware' => 'OrderUser'], function() {
	    Route::resource('profile', 'ProfileController', ['only' => ['show', 'edit','update','destroy']]);
	});
	Route::group(['middleware' => 'addr.user'], function() {
	    Route::resource('profile/address', 'AddressController', ['only' => ['show', 'edit','update','destroy']]);
	});

	Route::get('/admin/schedule/create/{id}', [
	    'as' => 'admin.schedule.create', 'uses' => 'ScheduleController@create'
	]);
	Route::resource('admin/schedule', 'ScheduleController');

	Route::group(['middleware' => 'admin'], function() {
		Route::get('/admin', ['as' => 'admin', function () {
		    return view('admin.index');
		}]);

		Route::resource('/admin/users', 'UserController');

		Route::resource('/admin/ingredient', 'IngredientController');
		Route::resource('/admin/supplier', 'SupplierController');
		Route::resource('/admin/supplyorder', 'SupplyOrderController');
		Route::resource('/admin/recipe', 'RecipeController');
		Route::resource('/admin/production', 'ProductionController');
		Route::get('/admin/recipe/{product}/ingredient/add', ['as'=>'admin.recipe.ingredient.add', 'uses' => 'IngredientController@add']);
		Route::post('/admin/recipe/{product}/ingredient', ['as'=>'admin.recipe.ingredient.storeAdd', 'uses' => 'IngredientController@AddStore']);

		Route::resource('/admin/category', 'CategoryController');
    Route::resource('/admin/pages', 'PagesController');

		Route::resource('/admin/hours', 'HoursController');

		Route::get('/admin/metrics/orders', ['as'=>'admin.metrics.orders', 'uses' => 'MetricsController@orders']);
		Route::get('/admin/metrics/inventory', ['as'=>'admin.metrics.inventory', 'uses' => 'MetricsController@inventory']);
		Route::get('/admin/metrics/supply', ['as'=>'admin.metrics.supply', 'uses' => 'MetricsController@supply']);
		Route::get('/admin/metrics/users', ['as'=>'admin.metrics.users', 'uses' => 'MetricsController@users']);
    Route::get('/admin/activity', ['as'=>'admin.activity', 'uses' => 'MetricsController@activity']);


		Route::get('/admin/products/low', ['as' => 'admin.products.low', 'uses' => 'ProductController@lowInventory']);
		Route::resource('admin/products', 'ProductController');

		Route::get('/admin/orders/pending', ['as' => 'admin.orders.pending', 'uses' => 'OrderController@pending']);
		Route::get('/admin/orders/completed', ['as' => 'admin.orders.completed', 'uses' => 'OrderController@completed']);
		Route::resource('/admin/orders', 'OrderController');
		Route::post('admin/orders', ['as' => 'admin.orders.employeestore', 'uses' => 'OrderController@employeeStore']);

	});
});

Route::get('{pageSlug}', [
    'as' => 'page.show', 'uses' => 'PagesController@show'
]);
