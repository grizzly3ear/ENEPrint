<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthenticationController@login');
Route::post('/register', 'AuthenticationController@register');

Route::get('/profile/{user_id}', 'ProfileController@showProfile');
Route::get('/profile/{user_id}/course', 'ProfileController@listCourseByUser');
Route::post('/profile/{user_id}/course', 'ProfileController@storeCourseToUser');
Route::post('/profile/{user_id}/upload', 'ProfileController@storeFileToCourse');
Route::get('/profile/{user_id}/file', 'ProfileController@listFile');
Route::put('/profile/{user_id}/remain-money', 'ProfileController@updateRemainMoney');

Route::get('course', 'CourseController@listCourse');
Route::post('course', 'CourseController@addCourse');
Route::get('course/{course_id}/file', 'CourseController@getFileFromCourse');
Route::get('course/search', 'CourseController@searchCourse');

Route::delete('instructor-course/{instructor_has_course_id}', 'CourseController@deleteCourseFromUser');
Route::delete('instructor-course/{instructor_has_course_id}/with-file', 'CourseController@deleteCourseFromUserWithFile');

Route::get('file', 'ProfileController@downloadFile');
Route::delete('file/{file_id}', 'ProfileController@deleteFile');

