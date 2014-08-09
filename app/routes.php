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
Route::model('Student', 'student');
Route::model('user','User');

Route::get('/', 'HomeController@index');

Route::get('/create', 'HomeController@showCreate');
Route::post('/create', 'HomeController@doCreate');

Route::post('/addstar', 'HomeController@addStar');

Route::get('register', 'HomeController@showRegister');
Route::post('register', 'HomeController@doRegister');

Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');

Route::get('show/{user}', 'HomeController@show');

Route::get('logout', 'HomeController@doLogout');