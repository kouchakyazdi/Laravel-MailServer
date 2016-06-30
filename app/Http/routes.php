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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aboutUs', 'PagesController@aboutUs');
Route::get('/create', 'PagesController@create');
Route::post('/create', 'PagesController@save');
Route::get('/allMails', 'PagesController@allMails');
Route::get('/users', 'UsersController@showAllUsers');
Route::post('/users', 'UsersController@addToContact');

Route::auth();
// here inbox is the same as dashboard (it's for authenticated users)
Route::get('/inbox', 'InboxController@inbox');
Route::get('/compose', 'InboxController@compose');
Route::get('/compose/sendSuccessfull', 'InboxController@sendSuccessfull');
Route::post('/compose', 'InboxController@send');
Route::get('/profile', 'InboxController@showProfile');
Route::post('/profile', 'InboxController@saveProfile');

