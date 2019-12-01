<?php

Auth::routes();

//Отделы
Route::get('get-all-department', 'DepartmentController@getDepartments');
Route::post('post-department', 'DepartmentController@postDepartments');
Route::post('update-department/{id}/', 'DepartmentController@updateDepartments');

Route::get('/teacher/{id}', 'DepartmentController@getTeachers');
Route::get('/instrument/{id}', 'DepartmentController@getInstruments');

Route::post('post-teacher', 'DepartmentController@postTeachers');
Route::post('post-instrument', 'DepartmentController@postInstruments');
Route::post('update-teacher/{id}/', 'DepartmentController@uupdateTeachers');
Route::post('update-instrument/{id}/', 'DepartmentController@updateInstruments');

Route::post('delete-department/{id}/', 'DepartmentController@deleteDepartments');
Route::post('delete-teacher/{id}/', 'DepartmentController@deleteTeachers');
Route::post('delete-instrument/{id}/', 'DepartmentController@deleteInstruments');

//Документы
Route::get('get-document', 'DocumentController@getDocument');
Route::post('post-document', 'DocumentController@postDocument');

//Меню
Route::get('get-info', 'InfoController@getInfo');
Route::post('post-info', 'InfoController@postInfo');
Route::post('update-info/{id}/', 'InfoController@updateInfo');
Route::post('delete-info/{id}/', 'InfoController@deleteInfo');

//Вступ
Route::get('get-intro', 'IntroController@getIntro');
Route::post('post-intro', 'IntroController@postIntro');
Route::post('update-intro/{id}/', 'IntroController@updateIntro');
Route::post('delete-intro/{id}/', 'IntroController@deleteIntro');

//Новости Достижения История
Route::get('get-nas', 'NewsAchieveStoryController@getNewsAchieveStory');
Route::get('get-news', 'NewsAchieveStoryController@getNews');
Route::get('get-achieve', 'NewsAchieveStoryController@getAchieve');
Route::get('get-story', 'NewsAchieveStoryController@getStory');

//Фото новостей
Route::get('get-news-image/{id}/', 'NewsAchieveStoryController@getNewsImage');
Route::post('post-news-image', 'NewsAchieveStoryController@postNewsImage');

Route::post('post-news', 'NewsAchieveStoryController@postNews');
Route::post('post-achieve', 'NewsAchieveStoryController@postAchieve');
Route::post('post-story', 'NewsAchieveStoryController@postStory');

Route::post('update-news/{id}/', 'NewsAchieveStoryController@updateNews');
Route::post('update-achieve/{id}/', 'NewsAchieveStoryController@updateAchieve');
Route::post('update-story/{id}/', 'NewsAchieveStoryController@updateStory');

Route::post('delete-news/{id}/', 'NewsAchieveStoryController@deleteNews');
Route::post('delete-achieve/{id}/', 'NewsAchieveStoryController@deleteAchieve');
Route::post('delete-story/{id}/', 'NewsAchieveStoryController@deleteStory');

Route::get('/admin{any}', 'SpaController@admin')->where('any', '.*');
Route::get('/{any}', 'SpaController@index')->where('any', '.*');