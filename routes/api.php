<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('index', 'APIController@index');

Route::post('login', 'APIController@login');
Route::post('register', 'APIController@register');

Route::group(['middleware' => 'auth:api'], function()
{
    Route::get('jobs', 'APIController@jobIndex');

   Route::post('details', 'APIController@details');

   Route::post('store/branch', 'APIController@storeBranch');

   Route::post('store/delegate', 'APIController@storeDelegate');

   Route::post('store/product', 'APIController@storeProduct');

   Route::delete('delete/branch/{id}', 'APIController@destroyBranch');

   Route::delete('delete/delegate/{id}', 'APIController@destroyDelegate');
   Route::delete('delete/employee/{id}', 'APIController@destroyEmployee');
   Route::delete('delete/product/{id}', 'APIController@destroyProduct');
});
