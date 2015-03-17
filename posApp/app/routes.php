<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PersonController@index');
//Route::get('/', 'HomeController@index');
/*Login*/
Route::post('users/signin', 'UserController@postSignin');

/*Persons*/
Route::resource('persons', 'PersonController');
Route::post('persons/{id}/update', 'PersonController@update');
Route::get('persons/{id}/delete', 'PersonController@destroy');
Route::get('persons/{id}/show', 'PersonController@show');

/*Users*/
Route::resource('users', 'UserController');
Route::post('users/{id}/update', 'UserController@update');
Route::get('users/{id}/delete', 'UserController@destroy');
Route::get('users/{id}/show', 'UserController@show');
Route::get('users/{id}/select', 'UserController@select');
