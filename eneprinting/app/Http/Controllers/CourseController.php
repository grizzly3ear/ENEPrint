<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

class CourseController extends Controller
{
    public function listCourse(){
        return Course::all();
    }

    public function addCourse(Request $request){
        $course = $this->mapRequestToCourse($request);
        $course->save();
        return $course;
    }

    public function mapRequestToCourse(Request $request){
        $course = new Course();
        $course->code = $request->code;
        $course->name = $request->name;
        $course->type = $request->type;
        $course->year = $request->year;
        return $course;
    }
}
