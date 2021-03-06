<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin{any}', 'SpaController@admin')->where('any', '.*');

    // USERS
    Route::get('/user/{id}', 'UserController@getUserId');
    Route::post('/user/{id}', 'UserController@updateUser');
});

//Вступ
Route::get('get-intro', 'IntroController@getIntro');
Route::post('post-intro', 'IntroController@postIntro');
Route::post('post-intro-file', 'IntroController@postIntroFile');
Route::post('update-intro/{id}/', 'IntroController@updateIntro');
Route::post('delete-intro/{id}/', 'IntroController@deleteIntro');

Route::get('site-info', 'InfoController@getSiteInfo');

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
