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

// Route::get('/', 'HomeController@index');
Route::get('/', 'Info\NewsController@home');
Route::get('/home', 'HomeController@index');
// laravel auth middleware
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//  Module 0: Public Informations
Route::group(['prefix' => 'info', 'namespace' => 'Info'], function()
{
  // information -> hotlines
  Route::get('/hotlines', 'HotlinesController@home');

  // information -> doctors
  Route::get('/doctors/home', 'DoctorsController@home');
  Route::get('/doctors/{id}/view', 'DoctorsController@view'); // doctor detail page
  Route::get('/doctors/angular','DoctorsController@angular'); // for angular pagination
  Route::resource('/doctors', 'DoctorsController');  
  // information -> doctors specialties -------------------------------------------------------------- // 
  Route::get('/specialties', 'DoctorsController@getSpecialty');// doctor specialty // 2 levels// return json data
  Route::get('/specialties/{id}/', 'DoctorsController@showSpecialty');

  // information -> facilities ----------------------------------------------------------------------- // 
  Route::get('/facilities/home', 'FacilitiesController@home');
  Route::get('/facilities/{id}/view', 'FacilitiesController@view'); // facilities detail page
  Route::get('/facilities/angular','FacilitiesController@angular'); // for angular pagination
  Route::resource('/facilities', 'FacilitiesController');

  Route::get('/facilitiescategory', 'FacilitiesController@getCategory'); // 2 levels// return json data
  // restful get a news category
  Route::get('/facilitiescategory/{id}/', 'FacilitiesController@showCate');

  // information -> conditions ----------------------------------------------------------------------- // 
  Route::get('/conditions/home', 'ConditionsController@home');
  Route::get('/conditions/{id}/view', 'ConditionsController@view'); // facilities detail page
  Route::get('/conditions/angular','ConditionsController@angular'); // for angular pagination
  Route::resource('/conditions', 'ConditionsController');

  // information -> news ------------------------------------------------------------------------------ // 
  Route::get('/news/home', 'NewsController@home'); // news home pae 
  Route::get('/news/{id}/view', 'NewsController@view'); // news detail page
  Route::get('/news/angular','NewsController@angular'); // for angular pagination
  Route::resource('/news', 'NewsController'); // restful data resource(return json data)
  // information -> news category
  Route::get('/newscategory', 'NewsController@getCategory');// return json data
  // restful get a news category
  Route::get('/newscategory/{id}/', 'NewsController@showCate');

});


//  Module 1: Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth', 'middleware' => 'admin'], function()
{
  Route::get('/doctors/home', 'DoctorsController@home');

  // goto angular view page(make::View)
  Route::get('/users/home', 'UsersController@view');
  // to maintain all users data
  Route::resource('/users', 'UsersController'); // restfu data resource

  // to maintain  facility category data // not finished yet
  Route::resource('/facilitiescategory', 'FacilitiesCategoryController');

});

// Module 2: CMS
Route::group(['prefix' => 'cms', 'namespace' => 'Cms', 'middleware' => 'auth', 'middleware' => 'editor'], function()
{
  // --- cms home ------------------------------------------------------------------------------ // 
  Route::get('/', 'CmsHomeController@index'); // /cms home page

  // cms news ------------------------------------------------------------------------------ // 
  Route::get('/news/home', 'NewsController@home'); // news home pae 
  Route::get('/news/{id}/view', 'NewsController@view'); // news detail page
  Route::get('/news/angular','NewsController@angular'); // for angular pagination
  Route::resource('/news', 'NewsController'); // restful data resource(return json data)
  // cms news category
  Route::get('/newscategory', 'NewsController@getCategory');// return json data
  // restful get a news category
  Route::get('/newscategory/{id}/', 'NewsController@showCate');


  // cms facilities ----------------------------------------------------------------------- // 
  Route::get('/facilities/home', 'FacilitiesController@home');
  Route::get('/facilities/{id}/view', 'FacilitiesController@view'); // facilities detail page
  Route::get('/facilities/angular','FacilitiesController@angular'); // for angular pagination
  Route::resource('/facilities', 'FacilitiesController');

  Route::get('/facilitiescategory', 'FacilitiesController@getCategory'); // 2 levels// return json data
  // restful get a news category
  Route::get('/facilitiescategory/{id}/', 'FacilitiesController@showCate');


  // cms doctors -------------------------------------------------------------------------- // 
  Route::get('/doctors/home', 'DoctorsController@home');
  Route::get('/doctors/{id}/view', 'DoctorsController@view'); // doctor detail page
  Route::get('/doctors/angular','DoctorsController@angular'); // for angular pagination
  Route::resource('/doctors', 'DoctorsController');  
  // cms doctors specialties -------------------------------------------------------------- // 
  Route::get('/specialties', 'DoctorsController@getSpecialty');// doctor specialty // 2 levels// return json data
  Route::get('/specialties/{id}/', 'DoctorsController@showSpecialty');


  // cms conditions ----------------------------------------------------------------------- // 
  Route::get('/conditions/home', 'ConditionsController@home');
  Route::get('/conditions/{id}/view', 'ConditionsController@view'); // facilities detail page

  Route::get('/conditions/angular','ConditionsController@angular'); // for angular pagination
  Route::resource('/conditions', 'ConditionsController');

});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function()
{
  // not resource control
  Route::get('/{id}/profile', 'UserProfileController@view');
  Route::get('/{id}/edit', 'UserProfileController@edit');
  Route::post('/{id}/edit','UserProfileController@update');
});

// Module 3: My Health
Route::group(['prefix' => 'myhealth', 'namespace' => 'My', 'middleware' => 'auth', 'middleware' => 'user'], function()
{
  // myhealth homepage
  Route::get('/home', 'MyController@home');

  // myhealth family ---------------------------------------------------------------------//
  Route::get('/family/home', 'FamilyController@home');
  Route::resource('/family', 'FamilyController');

  // myhealth insurance ---------------------------------------------------------------------//
  Route::get('/insurances/home', 'InsurancesController@home');
  Route::resource('/insurances', 'InsurancesController');

  // myhealth appointment ---------------------------------------------------------------------//
  Route::get('/appointments/home', 'AppointmentsController@home');
  Route::resource('/appointments', 'AppointmentsController');
  
  // myhealth appointment ---------------------------------------------------------------------//
  Route::get('/conditions/home', 'ConditionsController@home');
  Route::resource('/conditions', 'ConditionsController');

});

