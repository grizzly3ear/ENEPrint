<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

use App\User;
use App\Course;
use App\Document;

use App\Http\Resources\FileResource;
use App\Http\Resources\CourseResource;

class ProfileController extends Controller
{
    private $storageDisk = 's3';

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
        return CourseResource::collection($courses);
    }

    public function storeFileToCourse(Request $request, $user_id){
        $instructor = $this->showProfile($user_id);
        $document = $this->mapRequestToDocument($request);
        $document->instructor_id = $instructor->id;
        $file = $request->file('file');

        $url = $this->uploadPublicFile($file, 'file/'.$instructor->id.'/'.$document->course_id, $request->file_name);

        $document->file_name = $request->file_name;
        $document->file_path = $url;
        $document->file_type = $request->file_type;
        $document->save();
        return new FileResource($document);
    }

    public function uploadPublicFile(UploadedFile $file, String $path, String $file_name) {
        $filePath = Storage::disk($this->storageDisk)->putFileAs($path, $file, $file_name, 'public');

        $url = $this->getPermanentUrl($filePath);

        return $url;
    }

    public function getPermanentUrl(String $path) {
        $exists = Storage::disk($this->storageDisk)->exists($path);

        if ($exists) {
            $url = Storage::disk($this->storageDisk)->url($path);
            return $url;
        }
        return abort(404, 'Invalid File.');
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
        $path = 'file/'.$document->instructor_id.'/'.$document->course_id.'/'.$document->file_name;

        $exists = Storage::disk($this->storageDisk)->exists($path);

        if ($exists) {
            Storage::disk($this->storageDisk)->delete($path);
        }
        return $file_id;
    }

    public function mapRequestToDocument(Request $request){
        $document = new Document();
        $document->course_id = $request->course_id;
        return $document;
    }

}
