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
Route::group(['middleware' => 'auth'], function () {
    Route::resource('quotes', 'QuoteController', ['except' => ['index', 'show']]);
    Route::post('quotes-comment/{id}', 'QuoteCommentController@store');
    Route::get('quotes-comment/{id}/edit', 'QuoteCommentController@edit');
    Route::put('quotes-comment/{id}', 'QuoteCommentController@update');
    Route::delete('quotes-comment/{id}', 'QuoteCommentController@destroy');

    Route::get('/like/{type}/{model}','LikeController@like');
    Route::get('/unlike/{type}/{model}','LikeController@unlike');

    Route::get('/notifications','HomeController@get_notif');
});


Route::get('quotes/random', 'QuoteController@random');
Route::get('/profile/{id?}', 'HomeController@profile');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/quotes/filter/{tag}','QuoteController@filter');

Route::resource('quotes', 'QuoteController', ['only' => ['index', 'show']]);
