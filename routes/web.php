<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/about', 'App\Http\Controllers\HomeController@about' );
Route::get('/contact', 'App\Http\Controllers\HomeController@contact' );
Route::resource('posts', 'App\Http\Controllers\PostsController');
Route::get('/post/{id}', 'App\Http\Controllers\PostsController@show')->name('posts.show');
Route::get('/delete/{id}', 'App\Http\Controllers\PostsController@delete')->middleware(['auth', 'verified'])->name('posts.delete');
Route::get('/create', 'App\Http\Controllers\PostsController@create')->middleware(['auth', 'verified']);
Route::get('/post/edit/{id}', 'App\Http\Controllers\PostsController@EditPost')->middleware(['auth', 'verified'])->name('posts.EditPost');
Route::put('/post/{id}', 'App\Http\Controllers\PostsController@update')->middleware(['auth', 'verified'])->name('posts.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
