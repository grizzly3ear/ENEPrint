<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Instructor;

class ProfileController extends Controller
{
    public function showProfile($user_id){
        return User::find($user_id)->instructorProfile;
    }

}
