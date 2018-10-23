<?php

use \Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/post', 'BlogPostController');

Route::patch('/post/{post}', 'BlogPostController@undelete')->name('post.undelete');

Route::resource('/user', 'UserController');

Route::get('/posts/user/{user}', 'BlogPostController@user')->name('post.user');
