<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Course;
use App\Document;

use App\Http\Resources\FileResource;

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
        $instructor = $this->showProfile($user_id);
        $document = $this->mapRequestToDocument($request);
        $document->instructor_id = $instructor->id;
        $file = $request->file('file');
        $path = $file->storeAs($instructor->id.'-file', $request->file_name);
        $document->file_name = $request->file_name;
        $document->file_path = $path;
        $document->file_type = $request->file_type;
        $document->save();
        return new FileResource($document);
    }

    public function listFile($user_id){
        $instructor = User::find($user_id)->instructorProfile;
        $documents = $instructor->documents;
        return FileResource::collection($documents);
    }

    public function downloadFile(Request $request){
        $file_path = $request->query('file_name');
        return Storage::download($file_path);
    }

    public function deleteFile($file_id) {
        $document = Document::find($file_id);
        $document->delete();
        return $file_id;
    }

    public function mapRequestToDocument(Request $request){
        $document = new Document();
        $document->course_id = $request->course_id;
        return $document;
    }

}
