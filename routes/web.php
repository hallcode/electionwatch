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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/elections/', 'ElectionController@index');
Route::get('/elections/{title}', 'ElectionController@show');

Route::get('/levels/', 'LevelController@index');
Route::get('/levels/{title}', 'LevelController@show');

Route::get('/notices/', 'NoticeController@index');
Route::get('/notices/{id}', 'NoticeController@show');

Route::namespace('Admin')->prefix('admin')->group(function(){

    Route::get('/', 'AdminController@index');

    Route::get('/notices', 'NoticesController@index');
    Route::get('/notices/create', 'NoticesController@create');
    Route::get('/notices/{id}/edit', 'NoticesController@edit');
    Route::post('/notices', 'NoticesController@store');
    Route::get('/notices/{id}/delete', 'NoticesController@delete');

    Route::get('/polls', 'PollsController@index');
    Route::get('/polls/create', 'PollsController@create');
    Route::post('/polls', 'PollsController@store');
    Route::get('/polls/{id}/delete', 'PollsController@delete');
});

Route::get('/{title}', 'PagesController@page')->name('page');
