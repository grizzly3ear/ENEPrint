<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Course;

class ProfileController extends Controller
{
    public function showProfile($user_id){
        return User::find($user_id)->instructorProfile;
    }

    public function storeCourseToUser(Request $request, $user_id){
        $instructor = User::find($user_id)->instructorProfile;
        $course = Course::find($request->course_id);
        $instructor->courses()->save($course);
        return $course;
    }

    public function listCourseByUser($user_id){
        $courses = User::find($user_id)->instructorProfile->courses;
        return $courses;
    }

}
