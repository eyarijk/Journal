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

Route::post('/black-list','BlackListController@show');

Route::post('/journal/save','Api\JournalController@save');

Route::post('/journal/store/day','Api\JournalController@storeDay');

Route::post('/rating/save','Teacher\RatingsController@save');
