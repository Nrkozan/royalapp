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

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () { return view('login'); });
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');

Route::group(['middleware' => 'CustomAuth'], function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/books', 'App\Http\Controllers\BooksController@index')->name('books');
    Route::get('/author/{id}', 'App\Http\Controllers\AuthorsController@index')->name('author');
    Route::get('/book/{id}', 'App\Http\Controllers\BooksController@index')->name('book');
    Route::post('/authorBookDelete', 'App\Http\Controllers\AuthorsController@deleteBook')->name('authorBookDelete');
    Route::get('bookEdit/{id}', 'App\Http\Controllers\BooksController@edit')->name('bookEdit');
    Route::get('bookAdd', 'App\Http\Controllers\BooksController@add')->name('bookAdd');
    Route::post('bookAdd', 'App\Http\Controllers\BooksController@storeBook')->name('storeBook');
    Route::get('authorAdd', 'App\Http\Controllers\AuthorsController@add')->name('authorAdd');
    Route::post('authorAdd', 'App\Http\Controllers\AuthorsController@storeAuthor')->name('storeAuthor');
    Route::get('deleteAtuhor/{id}', 'App\Http\Controllers\AuthorsController@delete')->name('deleteAtuhor');
    Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
    Route::get('authorEdit/{id}', 'App\Http\Controllers\AuthorsController@edit')->name('authorEdit');
    Route::post('authorEdit/{id}', 'App\Http\Controllers\AuthorsController@putAuthor')->name('putAuthor');
    Route::get('profile', 'App\Http\Controllers\UsersController@index')->name('profile');
    Route::post('profile', 'App\Http\Controllers\UsersController@putProfile')->name('putProfile');
    Route::post('putBook/{id}', 'App\Http\Controllers\BooksController@putBook')->name('putBook');
    Route::get('deleteBook/{id}', 'App\Http\Controllers\BooksController@delete')->name('deleteBook');
});
