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

//Route::get('/', 'UserController@index');
Route::get('/', 'HomeController@index');

/*Menus*/
Route::resource('menus', 'MainMenuController');
Route::post('menus/{id}/update', 'MainMenuController@update');
Route::get('menus/{id}/delete', 'MainMenuController@destroy');
Route::get('menus/{id}/show', 'MainMenuController@show');
Route::get('menus/{id}/subIndex', 'MainMenuController@subIndex');
Route::get('menus/{id}/createSubMenu', 'MainMenuController@createSubMenu');
Route::get('menus/{id}/editSubMenu', 'MainMenuController@editSubMenu');

/*Login*/
Route::post('users/signin', 'UserController@postSignin');
