<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\InstructorHasCourse;
use App\Instructor;

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

    public function deleteCourseFromUser($instructor_has_course_id){
        $course = InstructorHasCourse::find($instructor_has_course_id);
        $course->delete();
        return $course->id;
    }

    public function deleteCourseFromUserWithFile($instructor_has_course_id){
        $course = InstructorHasCourse::find($instructor_has_course_id);
        $instructor_id = $course->instructor_id;
        $course_id = $course->course_id;
        $instructor = Instructor::find($instructor_id);
        $documents = $instructor->documents;
        foreach ($documents as $document) {
            if ($document->instructor_id == $course_id) {
                $document->delete();
            }
        }
        $course->delete();
        return $course->id;
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
