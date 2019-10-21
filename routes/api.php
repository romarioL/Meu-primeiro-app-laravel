<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('blog', 'BlogController');

Route::post('blog/comment/{blog}', 'BlogController@addComment');

Route::get('blog/comment/{blog}', 'BlogController@showComment');

Route::put('blog/comment/{blog}/{comment}', 'BlogController@updateComment');

Route::delete('blog/comment/{blog}/{comment}', 'BlogController@deleteComment');


Route::resource('library', 'LibraryController');

Route::post('library/author/{book}', 'LibraryController@addAuthor');

Route::get('library/author/{author}', 'LibraryController@showAuthor');

Route::put('library/author/{author}', 'LibraryController@updateAuthor');

Route::delete('library/author/{author}', 'LibraryController@deleteAuthor');