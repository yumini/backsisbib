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

Route::post('/auth_register', 'UserController@register');
Route::post('/auth_login', 'UserController@login');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserController@getAuthUser');
    Route::get('countries', 'CountryController@index');
    Route::post('countries', 'CountryController@store');
    Route::post('country/editar', 'CountryController@update');
	Route::delete('country/{id}/eliminar', 'CountryController@delete');
});

