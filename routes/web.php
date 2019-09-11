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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('users/logout', 'Auth\LoginController@userLogout')->name('users.logout');



Route::prefix('admin')->group(function () {


        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

        Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

        Route::get('/', 'OwnerController@index')->name('admin.dashboard');



    });

Route::get('dashboard', 'OwnerController@index');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:admin']], function () {
    //admin routes

Route::group(['as' => 'user.', 'prefix' => 'user'] , function () {
    Route::get('all', 'UserController@index')->name('all');
    Route::get('/create', 'UserController@create')->name('create');

    Route::post('/store', 'UserController@store')->name('store');

    Route::delete('/destroy/{id}', 'UserController@destroy')->name('destroy');
});



Route::group(['as' => 'settings.', 'prefix' => 'setting' ], function () {

    Route::get('show', 'SettingsController@showSetting')->name('show');
    Route::post('save', 'SettingsController@updateSettings')->name('save');

  });

});
