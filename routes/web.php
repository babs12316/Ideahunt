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
Route::post('/home', 'HomeController@addIdea')->name('home');
Route::get('/home', 'HomeController@displayIdea')->name('display');

//Route::get('/home/?id={id}', 'HomeController@cardData')->name('display');
Route::get('/home/idea/{id}', 'IdeaDetailController@cardData')->name('display');
Route::post('/home/idea/{id}', 'IdeaDetailController@insertLikes')->name('display');

Route::get('/home/myIdeas', 'MyIdeasController@show')->name('display');
Route::get('/home/myIdeas/edit/{id}', 'ModifyIdeaController@edit')->name('display');

Route::post('/home/myIdeas', 'ModifyIdeaController@update')->name('display');
Route::post('/home/myIdeas/delete/{id}', 'ModifyIdeaController@delete')->name('display');
//Route::post('/home/myIdeas/delete/{id}', 'IdeaDetailController@deleteLikes')->name('display');