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
        return $instructor;
    }

    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return Auth::id();
        }else{
            return null;
        }
    }

    public function mapRequestToInstructor(Request $request){
        $instructor = new Instructor();
        $instructor->name = $request->name;
        $instructor->surname = $request->surname;
        $instructor->email = $request->email;
        $instructor->instructor_id = $request->instructor_id;

        return $instructor;
    }

    public function mapRequestToUser(Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->remain_money = $request->remain_money;
        return $user;
    }

    public function attempt($username, $password){
        $user = User::where('username', $username)->get()->values()->first();
        $hashPassword = Hash::make($password);
        print $user->password. '\n';
        print $hashPassword;
        if( $user->password == $hashPassword ){
            return true;
        }
        return false;
    }
}
