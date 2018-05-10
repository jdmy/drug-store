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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
	Route::group(['middleware' => 'auth.admin:admin'], function () {
        Route::resource('products', 'ProductController');
        Route::resource('stores', 'StoreController');
        Route::get('users', 'UserController@index');
        Route::delete('users/{id}', 'UserController@destroy');
    });
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->post('logout', 'LoginController@logout');

    $router->get('/', 'DashboardController@index');
    
});

