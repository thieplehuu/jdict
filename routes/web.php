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

Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', [
		'as' => 'home.index',
		'uses' => 'HomeController@index'
]);
Route::get('/home/add_word/{word?}', [
		'as' => 'home.add_word',
		'uses' => 'HomeController@add_Word'
]);
Route::get('/words/detail/{word}', [
		'as' => 'home.show',
		'uses' => 'HomeController@show'
]);Route::get('/words/related/{word}', [
		'as' => 'home.related',
		'uses' => 'HomeController@related'
]);
Route::get('/home/autocomplete', 'HomeController@autocomplete');
Route::get('/words', 'WordsController@logout');
Route::get('words/{word}/publish', [
		'as' => 'words.publish',
		'uses' => 'WordsController@publish'
]);
Route::get('words/reviews', [
		'as' => 'words.reviews',
		'uses' => 'WordsController@reviews'
]);
Route::get('words/export/{type}/{category_id?}/{search?}', [
		'as' => 'words.export',
		'uses' => 'WordsController@export'
]);
Route::get('categories/export/{type}', [
		'as' => 'categories.export',
		'uses' => 'CategoriesController@export'
]);
Route::get('users/export/{type}', [
		'as' => 'users.export',
		'uses' => 'UsersController@export'
]);

Route::get('/engine/pull', [
		'as' => 'engine.pull',
		'uses' => 'EngineController@pull'
]);
Route::get('/engine/push', [
		'as' => 'engine.push',
		'uses' => 'EngineController@push'
]);

Route::resource('categories', 'CategoriesController');
Route::resource('home', 'HomeController');
Route::resource('words', 'WordsController');
Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');
Route::resource('engine', 'EngineController');