<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/journal','Api\JournalController@index');

Route::get('/rating/export','Teacher\RatingsController@export');

Route::get('/black-list/export','BlackListController@export');

Route::post('/black-list','BlackListController@show');

Route::post('/journal/save','Api\JournalController@save');

Route::post('/journal/store/day','Api\JournalController@storeDay');

Route::post('/rating/save','Teacher\RatingsController@save');

Route::post('/rating/save/extra','Teacher\RatingsController@extra');

Route::post('/rating/save/all','Teacher\RatingsController@all');