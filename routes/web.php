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
Route::get('/home/{id}', 'HomeController@cardData')->name('display');
