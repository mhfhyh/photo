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

Route::get('/',"PhotosController@home")->name('home');
Route::get('/home',"PhotosController@home");

/*Route::post('home//{user_id}',"Auth\LoginController@index_add");*/
Route::get('photo/{id}',"PhotosController@Show_single_photo");
Route::get('/add', 'PhotosController@add_photo');
Route::post('/add', 'PhotosController@store')->name('add_photo');

//Auth::routes();


Route::get('/register', 'Auth\RegisterController@register')->name( 'register');
Route::post('/register','Auth\RegisterController@store')->name('new_user');

Route::get('/login',  'Auth\LoginController@create')->name('login_page');
Route::post('/login',  'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@destroy')->name('logout');
Route::post('/logout', 'Auth\LoginController@destroy')->name('logout');

Route::get('/password_reset', 'Auth\ForgotPasswordController@create')->name('password_reset');

