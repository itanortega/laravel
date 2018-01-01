<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home');
Route::get('/messages/{message}', 'MessagesController@show');
Route::post('/messages/create/', 'MessagesController@create')->middleware('auth');

Auth::routes();

Route::get('/users/{username}', 'UserController@show');
Route::get('/users/{username}/follows','UserController@follows');
Route::get('/users/{username}/followers','UserController@followers');
Route::post('/users/{username}/follow','UserController@follow');
Route::post('/users/{username}/unfollow','UserController@unfollow');