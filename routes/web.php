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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'PostController@index')->name('posts.index');

Route::get('/posts/create', 'PostController@create')->name('posts.create')->middleware('auth');

Route::get('/posts/show/{id}', 'PostController@show')->name('posts.show');

Route::get('/posts/edit/{id}', 'PostController@edit')->name('posts.edit')->middleware('auth');

Route::match(['get', 'post'], '/posts/update/{id}', 'PostController@update')->name('posts.update')->middleware('auth');

Route::match(['get', 'post'], '/posts/new_confirm', 'PostController@new_confirm')->name('posts.new_confirm')->middleware('auth');

Route::post('/posts/store', 'PostController@store')->name('posts.store')->middleware('auth');

Route::post('/posts/destroy/{id}', 'PostController@destroy')->name('posts.destroy')->middleware('auth');
