<?php

Auth::routes();


//Вступ
Route::get('get-intro', 'IntroController@getIntro');
Route::post('post-intro', 'IntroController@postIntro');
Route::post('post-intro-file', 'IntroController@postIntroFile');
Route::post('update-intro/{id}/', 'IntroController@updateIntro');
Route::post('delete-intro/{id}/', 'IntroController@deleteIntro');

Route::post('delete-news-images/{id}/', 'NewsAchieveStoryController@deleteNewsImage');
Route::post('delete-achieve-images/{id}/', 'NewsAchieveStoryController@deleteAchieveImage');
Route::post('delete-story-images/{id}/', 'NewsAchieveStoryController@deleteStoryImage');

Route::get('/admin{any}', 'SpaController@admin')->where('any', '.*');
Route::get('/{any}', 'SpaController@index')->where('any', '.*');