<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/', 'PostsController@index');
// This routes requests for "/p/create".
Route::get('/p/create', 'PostsController@create'); // Upload page.
//Ensure that this route comes after all the other /p/.. routes to avoid conflicts.
Route::get('/p/{post}', 'PostsController@show'); //Display image page. {passes $post to the PostController}
Route::post('/p', 'PostsController@store'); // Image posting

/*It's extremelly important to follow the RESTFUl conventions.*/
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show'); //Get the profile
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit'); //Edit the profile
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update'); //Edit profile
