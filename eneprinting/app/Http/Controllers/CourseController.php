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

    public function searchCourse(Request $request){
        $courses = Course::where('code', 'like', '%'.$request->query('keyword').'%')
                        ->orWhere('name', 'like', '%'.$request->query('keyword').'%')->get();
        return $courses;
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
