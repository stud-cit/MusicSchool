<?php

use Illuminate\Http\Request;

// Галерея

Route::get('gallery', 'GalleryController@getFile');
Route::post('gallery', 'GalleryController@postFile');
Route::post('delete-gallery', 'GalleryController@deleteFile');

// Загальна інформація

Route::get('info', 'InfoController@getInfo');
Route::get('page-info', 'InfoController@getPageInfo');
Route::get('page-info/{page}', 'InfoController@getPageInfoId');
Route::post('page-info', 'InfoController@putPageInfo');
Route::post('update-info', 'InfoController@updateInfo');
Route::get('main-info', 'InfoController@getMainInfo');
Route::post('put-logo', 'InfoController@putLogo');

// Відділи

Route::get('department', 'DepartmentController@getDepartments');
Route::get('department/{id}', 'DepartmentController@getDepartmentsId');
Route::post('department', 'DepartmentController@postDepartments');
Route::post('department/{id}', 'DepartmentController@updateDepartments')->where(['id' => '^[0-9]+']);
Route::delete('department/{id}', 'DepartmentController@deleteDepartments')->where(['id' => '^[0-9]+']);

// Вчителі

Route::get('teachers', 'DepartmentController@getTeachers');
Route::get('teacher/{id}', 'DepartmentController@getTeacherId')->where(['id' => '^[0-9]+']);
Route::get('teacher/department/{id}', 'DepartmentController@getTeacherDepartmentId')->where(['id' => '^[0-9]+']);
Route::post('teacher', 'DepartmentController@postTeachers');
Route::delete('teacher/{id}', 'DepartmentController@deleteTeachers');
Route::post('teacher/{id}', 'DepartmentController@updateTeachers');

// Інструменти

Route::get('instruments', 'DepartmentController@getInstruments');
Route::get('instrument/{id}', 'DepartmentController@getInstrumentId')->where(['id' => '^[0-9]+']);
Route::get('instrument/department/{id}', 'DepartmentController@getInstrumentDepartmentId')->where(['id' => '^[0-9]+']);
Route::post('instrument', 'DepartmentController@postInstruments');
Route::post('instrument/{id}', 'DepartmentController@updateInstruments');
Route::delete('instrument/{id}/', 'DepartmentController@deleteInstruments');

// Вступ

Route::get('intro', 'IntroController@getIntro');
Route::post('intro', 'IntroController@postIntro');

// Новини

Route::get('news', 'NewsStoryController@getNews');
Route::get('news/{id}', 'NewsStoryController@getNewsId')->where(['id' => '^[0-9]+']);
Route::delete('news/{id}', 'NewsStoryController@deleteNews')->where(['id' => '^[0-9]+']);
Route::post('news/{id}', 'NewsStoryController@updateNews')->where(['id' => '^[0-9]+']);
Route::post('news', 'NewsStoryController@postNews');
Route::delete('news-images/{id}', 'NewsStoryController@deleteNewsImage');

// Досягнення

Route::get('achieve', 'NewsStoryController@getAchieve');
Route::get('achieve/{id}', 'NewsStoryController@getAchieveId')->where(['id' => '^[0-9]+']);
Route::post('achieve', 'NewsStoryController@postAchieve');
Route::post('achieve/{id}', 'NewsStoryController@updateAchieve');
Route::delete('achieve/{id}', 'NewsStoryController@deleteAchieve');
Route::delete('achieve-images/{id}', 'NewsStoryController@deleteAchieveImage');

// Історії

Route::get('story', 'NewsStoryController@getStory');
Route::get('story/{id}', 'NewsStoryController@getStoryId')->where(['id' => '^[0-9]+']);
Route::post('story/{id}', 'NewsStoryController@updateStory')->where(['id' => '^[0-9]+']);
Route::delete('story/{id}', 'NewsStoryController@deleteStory');
Route::post('story', 'NewsStoryController@postStory');
Route::delete('story-images/{id}', 'NewsStoryController@delAchieveImage');

//Документы
Route::get('document', 'DocumentController@getDocument');
Route::post('document/{id}', 'DocumentController@postDocument');

// Опис сайтів

Route::get('site-info', 'InfoController@getSiteInfo');
Route::post('site-info', 'InfoController@putSiteInfo');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
