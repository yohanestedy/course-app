<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(){
        return view('blog.auth.login');
    }
    public function register(){
        return view('blog.auth.register');
    }

    public function register_new_user(Request $request){
        $request = [
            "email"=> "email@gmail.com",
            "password" => "rahasia"
        ];

        User::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('login');
    }

}
