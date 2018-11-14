<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructor';

    public function courses(){
        return $this->belongsToMany('App\Course', 'instructor_has_course', 'instructor_id', 'course_id')->withPivot('id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }


}
