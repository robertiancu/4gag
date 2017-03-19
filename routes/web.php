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

/*Route::get('/', function () {
    return view('welcome');
});
 */

Auth::routes();

//Home

Route::get('/', 'PostController@hot');
Route::get('/home', 'PostController@hot');

// User routes

Route::get('/dashboard', 'UserController@home')->middleware('guest.redirect');
Route::get('/user/{id}','UserController@user');


// Admin routes

Route::get('/reports','AdminController@reports')->middleware('admin');
Route::get('/admins','AdminController@admins');
Route::post('/admins','AdminController@makeadmin');
Route::put('/user/{id}/setrank','AdminController@setrank');
Route::delete('/user/{id}/takeadmin','AdminController@takeadmin');

// Post routes

Route::get('/hot', 'PostController@hot');
Route::get('/fresh', 'PostController@fresh');
Route::get('/post/{id}', 'PostController@show');
Route::get('/newpost', 'PostController@newpost');
Route::post('/newpost/submit', 'PostController@submit');
Route::delete('/post/{id}/delete', 'PostController@delete');
Route::post('/post/{id}/report', 'PostController@report');

// Comments routes

Route::post('/post/{id}/comment','CommentController@comment');
Route::delete('/comment/{id}/delete','CommentController@delete');

//Like routes

Route::post('/comment/{id}/like','LikeController@likecomment');
Route::post('/post/{id}/like','LikeController@likepost');

// Categories routes

Route::get('/category/{category_name}', 'CategoryController@show');


// Favourites routes

Route::post('/addtofavourites','FavouriteController@add');
Route::get('/favourites','FavouriteController@index')->middleware('guest.redirect');
Route::delete('/favourites/{id}/delete','FavouriteController@delete');

