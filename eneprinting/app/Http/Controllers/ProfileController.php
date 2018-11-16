<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Course;
use App\Document;

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

    public function storeFileToCourse(Request $request, $user_id){
        $document = $this->mapRequestToDocument($request);
        $instructor = $this->showProfile($user_id);
        $document->instructor_id = $instructor->id;
        $file = $request->file('file');
        $path = $file->storeAs($instructor->id.'-file', $request->file_name.'.'.$file->extension());
        $document->file_name = $request->file_name;
        $document->file_path = $path;
        $document->save();
        return $document;
    }

    public function listFile($user_id){
        $instructor = User::find($user_id)->instructorProfile;
        $documents = $instructor->documents;
        return $documents;
    }


    public function mapRequestToDocument(Request $request){
        $document = new Document();
        $document->course_id = $request->course_id;
        return $document;
    }

}
