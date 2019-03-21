<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table = 'course';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('year', 'asc');
        });
    }

    public function instructors()
    {
        return $this->belongsTomany('App\Instructor', 'instructor_has_course', 'course_id', 'instructor_id')->withPivot('id');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student', 'course_plan', 'course_id', 'student_id')->withPivot('id');
    }

    public function documents()
    {
        return $this->hasMany('App\Document', 'course_id');
    }
}
