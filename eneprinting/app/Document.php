<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';

    public function course(){
        return $this->belongsTo('App\Course', 'course_id');
    }
}
