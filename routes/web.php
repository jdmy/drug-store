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
// });

Auth::routes();

Route::get('/', 'CategoryController@index')->name('home');
Route::get('/categories/{cid}/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@showbyone');
Route::post('/order_items', 'OrderItemController@store');
Route::get('/order_items', 'OrderItemController@index');
Route::delete('/order_items/{id}', 'OrderItemController@destroy');
Route::get('/orders/create','OrderController@create');
Route::get('/orders','OrderController@index');
Route::post('/orders','OrderController@store');
Route::get('/stores', 'StoreController@index');

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
	Route::group(['middleware' => 'auth.admin:admin'], function () {
        Route::resource('products', 'ProductController');
        Route::resource('stores', 'StoreController');
        Route::get('users', 'UserController@index');
        Route::delete('users/{id}', 'UserController@destroy');
        Route::any('stores/ajax/cities/{provinceid}','StoreController@city_ajax');
        Route::get('product_images/{pid}','ProductImageController@index');
        Route::post('product_images/{pid}','ProductImageController@upload');
        Route::delete('product_images/{pid}/{id}','ProductImageController@destroy');
    });
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->post('logout', 'LoginController@logout');

    $router->get('/', 'DashboardController@index');
    
});

