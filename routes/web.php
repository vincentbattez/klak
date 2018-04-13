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


Route::get('/','LandingPageController@index');


Route::get('/dashboard','DashboardController@index')->middleware('auth');
Route::get('/project/{id}','ProjectController@index')->where('id', '[0-9]+')->middleware('auth');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
