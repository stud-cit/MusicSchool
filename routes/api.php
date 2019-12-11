<?php

use Illuminate\Http\Request;

// Галерея

Route::get('gallery', 'GalleryController@getFile');
Route::post('gallery', 'GalleryController@postFile');
Route::post('delete-gallery', 'GalleryController@deleteFile');

// Загальна інформація

Route::get('info', 'InfoController@getInfo');
Route::post('update-info', 'InfoController@updateInfo');

// Відділи

Route::get('department', 'DepartmentController@getDepartments');
Route::post('department', 'DepartmentController@postDepartments');
Route::post('department/{id}', 'DepartmentController@updateDepartments')->where(['id' => '^[0-9]+']);
Route::delete('department/{id}', 'DepartmentController@deleteDepartments')->where(['id' => '^[0-9]+']);

Route::get('get-teacher', 'DepartmentController@getTeachers');

// Вступ

Route::get('intro', 'IntroController@getIntro');
Route::post('intro', 'IntroController@postIntro');

// Новини

Route::get('news', 'NewsAchieveStoryController@getNews');
Route::get('news/{id}', 'NewsAchieveStoryController@getNewsId')->where(['id' => '^[0-9]+']);
Route::delete('news/{id}', 'NewsAchieveStoryController@deleteNews')->where(['id' => '^[0-9]+']);
Route::post('update-news/{id}/', 'NewsAchieveStoryController@updateNews')->where(['id' => '^[0-9]+']);
Route::post('news', 'NewsAchieveStoryController@postNews');

// Досягнення

Route::get('achieve', 'NewsAchieveStoryController@getAchieve');
Route::get('achieve/{id}', 'NewsAchieveStoryController@getAchieveId')->where(['id' => '^[0-9]+']);
Route::post('achieve', 'NewsAchieveStoryController@postAchieve');
Route::post('update-achieve/{id}/', 'NewsAchieveStoryController@updateAchieve');
Route::delete('achieve/{id}/', 'NewsAchieveStoryController@deleteAchieve');

// Історії

Route::get('story', 'NewsAchieveStoryController@getStory');
Route::get('story/{id}', 'NewsAchieveStoryController@getStoryId')->where(['id' => '^[0-9]+']);
Route::post('update-story/{id}', 'NewsAchieveStoryController@updateStory')->where(['id' => '^[0-9]+']);
Route::delete('story/{id}', 'NewsAchieveStoryController@deleteStory');
Route::post('story', 'NewsAchieveStoryController@postStory');

//Документы
Route::get('get-document', 'DocumentController@getDocument');
Route::post('post-document', 'DocumentController@postDocument');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
