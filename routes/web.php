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
Route::get('/stores', 'StoreController@index');
Route::post('/search','TagController@search');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/order_items', 'OrderItemController@store');
    Route::get('/order_items', 'OrderItemController@index');
    Route::delete('/order_items/{id}', 'OrderItemController@destroy');
    Route::get('/orders/create','OrderController@create');
    Route::get('/orders','OrderController@index');
    Route::post('/orders','OrderController@store');
    Route::post('/pay','OrderController@pay');
});
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
	Route::group(['middleware' => 'auth.admin:admin'], function () {
        Route::resource('products', 'ProductController');
        Route::resource('stores', 'StoreController');
        Route::get('users', 'UserController@index');
        Route::delete('users/{id}', 'UserController@destroy');

        Route::get('tags','TagController@index');
        Route::get('tags/create','TagController@create');
        Route::post('tags','TagController@store');
        Route::delete('tags/{id}', 'TagController@destroy');
        Route::get('product_tag/{id}','TagController@product_tag_edit');
        Route::post('product_tag/{id}','TagController@product_tag_store');
        Route::delete('product_tag/{pid}','TagController@product_tag_destroy');

        Route::any('stores/ajax/cities/{provinceid}','StoreController@city_ajax');
        Route::get('product_images/{pid}','ProductImageController@index');
        Route::post('product_images/{pid}','ProductImageController@upload');
        Route::delete('product_images/{pid}/{id}','ProductImageController@destroy');

        Route::post('/search','TagController@search');
    });
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->post('logout', 'LoginController@logout');

    $router->get('/', 'DashboardController@index');
    
});

