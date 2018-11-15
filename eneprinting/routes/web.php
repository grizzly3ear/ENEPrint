<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {
    return 'helloword';
});

Route::post('/login', 'AuthenticationController@login');
Route::post('/register', 'AuthenticationController@register');

Route::get('/profile/{user_id}', 'ProfileController@showProfile');
Route::get('/profile/{user_id}/course', 'ProfileController@listCourseByUser');
Route::post('/profile/{user_id}/course', 'ProfileController@storeCourseToUser');

Route::get('course', 'CourseController@listCourse');
Route::post('course', 'CourseController@addCourse');
Route::get('course/search', 'CourseController@searchCourse');

Route::delete('instructor-course/{instructor_has_course_id}', 'CourseController@deleteCourseFromUser');
