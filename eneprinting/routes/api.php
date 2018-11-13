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

Route::post('/login', 'AuthenticationController@login');
Route::post('/register', 'AuthenticationController@register');
Route::get('/profile/{user_id}', 'ProfileController@showProfile');

Route::get('course', 'CourseController@listCourse');
Route::post('course', 'CourseController@addCourse');

