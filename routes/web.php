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

// Route::get('/', function () {
//     return view('welcome');
// });

// sign up
Route::get('/', 'SignupController@index');
Route::post('/', 'SignupController@signup');

// logging in and out
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

// displaying foods
Route::get('/all', 'foodController@index')->middleware('protected');
Route::get('/type/{thermal}', 'foodController@thermal')->middleware('protected');
Route::get('/type/{thermal}/{category}', 'foodController@category')->middleware('protected');

// editing thumbnails
Route::get('/food/{id}', 'foodController@food')->middleware('protected');
Route::post('/food/{id}', 'foodController@thumbnail')->middleware('protected');

