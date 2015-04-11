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
  // to maintain all users data
  Route::resource('/users', 'UsersController'); // restfu data resource

  // to maintain  facility category data // not finished yet
  Route::resource('/facilitiescategory', 'FacilitiesCategoryController');

});

// CMS module
Route::group(['prefix' => 'cms', 'namespace' => 'Cms', 'middleware' => 'auth', 'middleware' => 'editor'], function()
{
  // --- cms home ------------------------------------------------------------------------------ // 
  Route::get('/', 'CmsHomeController@index'); // /cms home page

  // cms news ------------------------------------------------------------------------------ // 
  Route::get('/news/home', 'NewsController@home'); // news home pae 
  Route::get('/news/{id}/view', 'NewsController@view'); // news detail page
  Route::resource('/news', 'NewsController'); // restful data resource(return json data)
  // cms news category
  Route::get('/newscategory', 'NewsController@getCategory');// return json data
  // restful get a news category
  Route::get('/newscategory/{id}/', 'NewsController@showCate');


  // cms facilities ----------------------------------------------------------------------- // 
  Route::get('/facilities/home', 'FacilitiesController@home');
  Route::get('/facilities/{id}/view', 'FacilitiesController@view'); // facilities detail page
  Route::resource('/facilities', 'FacilitiesController');

  Route::get('/facilitiescategory', 'FacilitiesController@getCategory'); // 2 levels// return json data
  // restful get a news category
  Route::get('/facilitiescategory/{id}/', 'FacilitiesController@showCate');
  

// 以下CMS功能还未完成
  // cms doctors -------------------------------------------------------------------------- // 
  Route::get('/doctors/home', 'DoctorsController@home');
  Route::get('/doctors/{id}/view', 'DoctorsController@view'); // facilities detail page
  Route::resource('/doctors', 'DoctorsController');  
  // cms doctors specialties -------------------------------------------------------------- // 
  Route::resource('/specialties;', 'SpecialtiesController');// doctor specialty // 2 levels// return json data


  // cms conditions ----------------------------------------------------------------------- // 
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


