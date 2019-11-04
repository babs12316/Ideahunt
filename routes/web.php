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
Route::get('/home', 'HomeController@displayIdea')->name('home');


Route::get('/home/idea/{id}', 'IdeaDetailController@cardData')->name('detail');
Route::post('/home/idea/{id}', 'IdeaDetailController@insertLikes')->name('detail');

Route::get('/home/myideas', 'MyIdeasController@show')->name('userideas');
Route::get('/home/myideas/edit/{id}', 'ModifyIdeaController@edit')->name('cruduseridea');

Route::post('/home/myideas', 'ModifyIdeaController@update')->name('cruduseridea');
Route::post('/home/myideas/delete/{id}', 'ModifyIdeaController@delete')->name('cruduseridea');
