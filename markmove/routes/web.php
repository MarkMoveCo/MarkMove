<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::resource('/landmark', 'LandmarkController');

Route::resource('/user', 'UserController');

Auth::routes();

// AdministrationController
Route::resource('/admin/permissions', 'AdministrationController@getPermissions');

