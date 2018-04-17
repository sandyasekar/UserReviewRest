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

Route::get('reviews', 'UserReviewController@index');
Route::get('reviews/{id}', 'UserReviewController@show');
Route::post('reviews', 'UserReviewController@store');
Route::put('reviews/{id}', 'UserReviewController@update');
Route::delete('reviews/{id}', 'UserReviewController@destroy');

