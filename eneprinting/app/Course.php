<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    public function instructors(){
        return $this->belongsTomany('App\Instructor', 'instructor_has_course', 'course_id', 'instructor_id')->withPivot('id');
    }

    public function students(){
        return $this->belongsToMany('App\Student', 'course_plan', 'course_id', 'student_id')->withPivot('id');
    }
}
