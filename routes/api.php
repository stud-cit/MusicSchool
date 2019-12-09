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
Route::post('department/{id}', 'DepartmentController@updateDepartments');
Route::delete('department/{id}', 'DepartmentController@deleteDepartments');

// Вступ

Route::get('intro', 'IntroController@getIntro');
Route::post('intro', 'IntroController@postIntro');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
