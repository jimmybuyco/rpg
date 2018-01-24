<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function welcome(){
        return view('welcome');
    }

    public function doLogin(){
        $name=\Illuminate\Support\Facades\Input::get("name");
        $pass=\Illuminate\Support\Facades\Input::get("password");

       $users = DB::table('users')->where('name',$name)->where('password',$pass)->first();
        if($users){
            $user = User::find($users->id);
            Auth::login($user);
            return Redirect::to('/');
        }
        else
            return Redirect::to('login');
    }


    public function logout(){
        Auth::logout();
        return Redirect::to('login');
    }
}