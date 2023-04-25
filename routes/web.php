<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index' );
Route::get('/login', 'App\Http\Controllers\HomeController@login' );
Route::get('/register', 'App\Http\Controllers\HomeController@register' );
Route::get('/about', 'App\Http\Controllers\HomeController@about' );
Route::get('/contact', 'App\Http\Controllers\HomeController@contact' );
Route::resource('posts', 'App\Http\Controllers\PostsController');
Route::get('/post/{id}', 'App\Http\Controllers\PostsController@show')->name('posts.show');
Route::get('/delete/{id}', 'App\Http\Controllers\PostsController@delete')->name('posts.delete');
Route::get('/create', 'App\Http\Controllers\PostsController@create');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');



