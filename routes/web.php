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
Route::get('/project/{slug}','ProjectController@index')
    //->where('id', '[0-9]+')
    ->where('slug', '^[a-z][-a-z0-9]*$')//'[A-Za-z]+')
    ->middleware('auth')
;

/*———————————————————————————————————*\
    $ TEAMS
\*———————————————————————————————————*/
Route::get('/team/{slug}','TeamController@index')
    ->where('slug', '^[a-z][-a-z0-9]*$')
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

/*———————————————————————————————————*\
    $ CREATED (PROJECT, TEAM, TASK)
\*———————————————————————————————————*/
Route::post('create/project/', 'createController@project')
    ->middleware('auth')
;
Route::post('create/team/', 'createController@team')
    ->middleware('auth')
;
Route::post('create/userteam/', 'createController@userteam')
    ->middleware('auth')
;
Route::post('create/task/', 'createController@task')
    ->middleware('auth')
;


/*———————————————————————————————————*\
    $ REMOVE (PROJECT, TEAM, TASK)
\*———————————————————————————————————*/
Route::post('remove/userteam/', 'removeController@userteam')
    ->middleware('auth')
;
