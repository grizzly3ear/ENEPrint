<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';

    public function studentProfile(){
        return $this->hasOne('App\Student', 'user_id');
    }
    public function instructorProfile(){
        return $this->hasOne('App\Instructor', 'user_id');
    }

}
