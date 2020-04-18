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

Route::view('/', 'index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'OnlineLibraryController@index')->name('main');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'OnlineLibraryController@index')->name('admin');
    Route::get('/users/list', 'UserController@index')->name('users');
    Route::get('/users/list/edit/{id}', 'UserController@edit')->name('user_edit');
    Route::put('/users/list/update/{user}', 'UserController@update')->name('user_update');
    Route::delete('/users/list/delete/{user}', 'UserController@destroy')->name('user_delete');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/add/book', 'BookController@index')->name('add_book');
    Route::post('/add/book/upload', 'BookController@upload')->name('book.upload');
    Route::get('/book/edit/{book?}/{id?}', 'BookController@edit')->name('book_edit');
    Route::put('/books/list/update/{book?}', 'BookController@update')->name('book_update');
    Route::delete('/book/delete/{book}', 'BookController@destroy')->name('book_delete');
});

Route::get('/{id}', 'OnlineLibraryController@show');
Route::get('/genre/{id}', 'OnlineLibraryController@getBooksWithGenre')->name('genre');
Route::get('/my_library/{id}', 'BookController@getMyLibrary')->name('my_library');
Route::get('/books/searchSimple', 'SearchController@search')->name('searchSimple');