<?php

Auth::routes();

//Отделы

Route::get('/teachers', 'DepartmentController@getTeachers');
Route::get('/teacher/{id}', 'DepartmentController@getTeacherId');

Route::get('/instruments', 'DepartmentController@getInstruments');
Route::get('/instrument/{id}', 'DepartmentController@getInstrumentId');

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
Route::post('update-intro/{id}/', 'IntroController@updateIntro');
Route::post('delete-intro/{id}/', 'IntroController@deleteIntro');

//Новости Достижения История
Route::get('get-nas', 'NewsAchieveStoryController@getNewsAchieveStory');
Route::get('get-news', 'NewsAchieveStoryController@getNews');
Route::get('get-news/{id}', 'NewsAchieveStoryController@getNewsId')->where(['id' => '^[0-9]+']);
Route::get('get-achieve', 'NewsAchieveStoryController@getAchieve');
Route::get('get-story', 'NewsAchieveStoryController@getStory');

Route::post('post-news', 'NewsAchieveStoryController@postNews');
Route::post('post-achieve', 'NewsAchieveStoryController@postAchieve');
Route::post('post-story', 'NewsAchieveStoryController@postStory');

Route::post('update-news/{id}/', 'NewsAchieveStoryController@updateNews');
Route::post('update-achieve/{id}/', 'NewsAchieveStoryController@updateAchieve');
Route::post('update-story/{id}/', 'NewsAchieveStoryController@updateStory');

Route::post('delete-news/{id}/', 'NewsAchieveStoryController@deleteNews');
Route::post('delete-achieve/{id}/', 'NewsAchieveStoryController@deleteAchieve');
Route::post('delete-story/{id}/', 'NewsAchieveStoryController@deleteStory');

Route::post('delete-news-images/{id}/', 'NewsAchieveStoryController@deleteNewsImage');
Route::post('delete-achieve-images/{id}/', 'NewsAchieveStoryController@deleteAchieveImage');

Route::get('/admin{any}', 'SpaController@admin')->where('any', '.*');
Route::get('/{any}', 'SpaController@index')->where('any', '.*');