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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::get('/post', 'PostController@post')->name('post');
Route::get ('/category', 'CategoryController@category')->name('category');
Route::post ('/addProfile', 'ProfileController@addProfile');
Route::post('addCategory', 'CategoryController@addCategory');