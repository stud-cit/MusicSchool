<?php

use Illuminate\Http\Request;

Route::get('/information', 'SpaController@index')->where('any', '.*');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
