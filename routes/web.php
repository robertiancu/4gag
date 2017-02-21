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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// User routes

Route::get('/dashboard', 'UserController@home');
Route::get('/user/{id}','UserController@user');


// Admin routes

Route::get('/reports','AdminController@reports');
Route::get('/admins','AdminController@admins');
Route::post('/admins','AdminController@makeadmin');
Route::put('/setrank/{rank}/user/{id}','AdminController@setrank');
Route::delete('/ban/user/{id}/','AdminController@ban');

// Post routes

Route::get('/', 'PostController@home');
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
Route::put('/comment/{id}/edit','CommentController@edit');

//Like routes
//
Route::post('/comment/{id}/like','LikeController@comment');
Route::post('/post/{id}/like','LikeController@post');

// Categories routes

Route::get('/categories', 'CategoryController@index');
Route::get('/category/{category_name}', 'CategoryController@show');


// Favourites routes

Route::post('/addtofavorites','FavouriteController@add');
Route::get('/favourites','FavouriteController@index');
Route::delete('/favourites/{id}/delete','FavouriteController@delete');

