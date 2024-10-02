<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $validator = Validator::make($request->all(), [
            'email'         => 'required',
            'password'      => 'required',
        ],);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // STEP 1
        // check apakah email yg diinputkan ada usernya
        // $user = User::where('email', $request->email)->first();
        // // kemungkinan output user = {.. data} / null
        // if(!$user){
        //     // return 'email empty'. $request->email;
        //     return redirect()->back()->with('error', 'email or password not valid');
        // }
        
        // STEP 2
        // check apakah passwordnya ini sama dengan usernya
        // Auth::attempt($post)
        // !Hash::check($fields['password'], $user->password)
        // if (!Hash::check($request->password, $user->password)) {
        //     // return 'password wrong'. $request->password;
        //     return redirect()->back()->with('error', 'email or password not valid');
        // }

        // STEP 3
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'success login');
        }

        // redirect ke home page
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with(['success' => 'seccess logout']);
    }

}
