<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

use App\Instructor;
use App\User;

class AuthenticationController extends Controller
{
    use AuthenticatesUsers;

    public function register(Request $request){
        $user = $this->mapRequestToUser($request);
        $user->save();
        $instructor = $this->mapRequestToInstructor($request);
        $instructor->user_id = $user->id;
        $instructor->save();
        return $user;
    }

    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return Auth::id();
        }else{
            return -1;
        }
    }

    public function mapRequestToInstructor(Request $request){
        $instructor = new Instructor();
        $instructor->name = $request->name;
        $instructor->surname = $request->surname;
        $instructor->email = $request->email;
        return $instructor;
    }

    public function mapRequestToUser(Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->remain_money = 0;
        return $user;
    }

}
