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
    //return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_author', 'authorController@index')->name('add_author');
Route::post('/insert_author', 'authorController@store')->name('store_author');
Route::get('/all_author', 'authorController@showAuthors')->name('all_author');
Route::get('/view_author/{id}', 'authorController@viewAuthorInfo');
Route::get('/delete_author/{id}', 'authorController@deleteAuthor');
Route::get('/edit_author/{id}', 'authorController@editAuthorInfo');
Route::post('/update_author/{id}', 'authorController@updateAuthorInfo')->name('update_author');
