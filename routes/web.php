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
    ->name('dashboard.index')
    ->middleware('auth')
;

/*———————————————————————————————————*\
    $ PROJECT
\*———————————————————————————————————*/
Route::get('/project/{id}','ProjectController@index')
    ->where('id', '[0-9]+')
    ->middleware('auth')
;


/*———————————————————————————————————*\
    $ PROFIL
\*———————————————————————————————————*/
Route::get('/profile/{id}','ProfileController@index')
    ->name('profile.index')
    ->where('id', '[0-9]+')
    ->middleware('auth')
;

/*———————————————————————————————————*\
    $ Styleguide
\*———————————————————————————————————*/
Route::view('/styleguide', 'styleguide');


/*———————————————————————————————————*\
    $ AUTH
\*———————————————————————————————————*/
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')
    ->name('logout')
;


/*———————————————————————————————————*\
    $ UPLOAD
\*———————————————————————————————————*/
Route::post('upload/user/picture/{idUser}', 'UploadController@userPicture')
    ->where('idUser', '[0-9]+')
    ->middleware('auth')
;