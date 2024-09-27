<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('pages.auth.login');
    }
    public function register()
    {
        return view('pages.auth.register');
    }

    // - menyimpan user baru 
    // - mengencrypt password    
    public function storeRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required',
        ],);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Berhasil Daftar, silahkan login.');
    }

    public function storeLogin(Request $request){
        // check apakah ada email di usernya
        // check apakah passwordnya ini sama dengan usernya
        // redirect ke home page
    }

}
