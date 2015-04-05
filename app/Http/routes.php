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

// Admin module
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth', 'middleware' => 'admin'], function()
{
  Route::get('/', 'AdminHomeController@index');
  // goto angular view page(make::View)
  Route::get('/users/home', 'UsersController@view');
  // laravel resource control
  Route::resource('/users', 'UsersController');

});

// CMS module
Route::group(['prefix' => 'cms', 'namespace' => 'Cms', 'middleware' => 'auth', 'middleware' => 'editor'], function()
{
  Route::get('/', 'CmsHomeController@index'); // /cms home page
  // news
  Route::get('/news/home', 'NewsController@view');
  Route::get('/newscategory', 'NewsController@getCategory');
  Route::resource('/news', 'NewsController');
  // doctors
  Route::get('/doctors/home', 'DoctorsController@view');
  Route::resource('/doctors', 'DoctorsController');
  // facilities
  Route::get('/facilities/home', 'FacilitiesController@view');
  Route::resource('/facilities', 'FacilitiesController');
  // conditions
  Route::get('/conditions/home', 'ConditionsController@view');
  Route::resource('/conditions', 'ConditionsController');

});

// User module
Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function()
{
  // not resource control
  Route::get('/{id}/profile', 'UserProfileController@view');
  Route::get('/{id}/edit', 'UserProfileController@edit');
  Route::post('/{id}/edit','UserProfileController@update');
});