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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
    Route::get('/', 'AdminHomeController@index');
    // goto angular view page(make::View)
    Route::get('/users/home', 'UsersController@view');
    Route::resource('/users', 'UsersController');//resource control

});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function()
{
    // not resource control
    Route::get('/{id}/profile', 'UserProfileController@view');
    Route::get('/{id}/edit', 'UserProfileController@edit');
    Route::post('/{id}/edit','UserProfileController@update');
});
