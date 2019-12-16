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
Route::get('department/{id}', 'DepartmentController@getDepartmentsId');
Route::post('department', 'DepartmentController@postDepartments');
Route::post('department/{id}', 'DepartmentController@updateDepartments')->where(['id' => '^[0-9]+']);
Route::delete('department/{id}', 'DepartmentController@deleteDepartments')->where(['id' => '^[0-9]+']);

Route::get('get-teacher', 'DepartmentController@getTeachers');
Route::get('get-teacher/{id}', 'DepartmentController@getTeacherId')->where(['id' => '^[0-9]+']);
Route::get('instruments', 'DepartmentController@getInstruments');
Route::get('front-instruments/{id}', 'DepartmentController@getFrontInstrumentId')->where(['id' => '^[0-9]+']);
Route::get('back-instruments/{id}', 'DepartmentController@getBackendInstrumentId')->where(['id' => '^[0-9]+']);

//Отделы Админка

Route::post('post-teacher', 'DepartmentController@postTeachers');
Route::post('post-instrument', 'DepartmentController@postInstruments');
Route::post('update-teacher/{id}/', 'DepartmentController@uupdateTeachers');
Route::post('update-instrument/{id}/', 'DepartmentController@updateInstruments');

Route::post('delete-teacher/{id}/', 'DepartmentController@deleteTeachers');
Route::post('delete-instrument/{id}/', 'DepartmentController@deleteInstruments');

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

Route::get('achieve', 'AchieveController@getAchieve');
Route::get('achieve/{id}', 'AchieveController@getAchieveId')->where(['id' => '^[0-9]+']);
Route::post('achieve', 'AchieveController@postAchieve');
Route::post('update-achieve/{id}/', 'AchieveController@updateAchieve');
Route::delete('achieve/{id}/', 'AchieveController@deleteAchieve');

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
