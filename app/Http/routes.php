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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('pages/{id}', 'UserController@show');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
    Route::get('/', 'AdminHomeController@index');
    Route::resource('users', 'UsersController');//资源控制器

});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function()
{
    Route::get('/{id}/profile', 'UserProfileController@view');
    Route::get('/{id}/edit', 'UserProfileController@edit');
    Route::post('/{id}/edit','UserProfileController@update');
});
