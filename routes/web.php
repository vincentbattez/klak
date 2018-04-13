<?php
/*———————————————————————————————————*\
    $ LANDING PAGE
\*———————————————————————————————————*/
Route::get('/','LandingPageController@index')
        ->name('landingPage.index')
      ;

/*———————————————————————————————————*\
    $ DASHBOARD
\*———————————————————————————————————*/
Route::get('/dashboard','DashboardController@index')
        ->middleware('auth')
        ->name('dashboard.index')
      ;

/*———————————————————————————————————*\
    $ PROJECT
\*———————————————————————————————————*/
Route::get('/project/{id}','ProjectController@index')
        ->where('id', '[0-9]+')
        ->middleware('auth')
      ;

/*———————————————————————————————————*\
    $ AUTH
\*———————————————————————————————————*/
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')
        ->name('logout')
      ;
