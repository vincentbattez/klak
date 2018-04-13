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


//Route::resource('/','Dashboard');


Route::get('/','LandingPage@index');
Route::get('/dashboard','Dashboard@index');//->middleware('auth')
Route::get('/project/{id}','Project@index')->where('id', '[0-9]+');//->middleware('auth')


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
