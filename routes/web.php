<?php

Auth::routes();

//Отделы
Route::post('post-teacher', 'DepartmentController@postTeachers');
Route::post('post-instrument', 'DepartmentController@postInstruments');
Route::post('update-teacher/{id}/', 'DepartmentController@uupdateTeachers');
Route::post('update-instrument/{id}/', 'DepartmentController@updateInstruments');

Route::post('delete-teacher/{id}/', 'DepartmentController@deleteTeachers');
Route::post('delete-instrument/{id}/', 'DepartmentController@deleteInstruments');

//Документы
Route::get('get-document', 'DocumentController@getDocument');
Route::post('post-document', 'DocumentController@postDocument');

//Вступ
Route::get('get-intro', 'IntroController@getIntro');
Route::post('post-intro', 'IntroController@postIntro');
Route::post('post-intro-file', 'IntroController@postIntroFile');
Route::post('update-intro/{id}/', 'IntroController@updateIntro');
Route::post('delete-intro/{id}/', 'IntroController@deleteIntro');

//Новости Достижения История
Route::post('post-achieve', 'NewsAchieveStoryController@postAchieve');
Route::post('update-achieve/{id}/', 'NewsAchieveStoryController@updateAchieve');
Route::post('delete-achieve/{id}/', 'NewsAchieveStoryController@deleteAchieve');

Route::post('delete-news-images/{id}/', 'NewsAchieveStoryController@deleteNewsImage');
Route::post('delete-achieve-images/{id}/', 'NewsAchieveStoryController@deleteAchieveImage');
Route::post('delete-story-images/{id}/', 'NewsAchieveStoryController@deleteStoryImage');

Route::get('/admin{any}', 'SpaController@admin')->where('any', '.*');
Route::get('/{any}', 'SpaController@index')->where('any', '.*');