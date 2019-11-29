<?php

use Illuminate\Http\Request;

Route::get('gallery', 'GalleryController@getFile');
Route::post('gallery', 'GalleryController@postFile');
Route::post('delete-gallery', 'GalleryController@deleteFile');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
