<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class LoginController extends Controller
{
    public function index(){
        //yang menyambunhgkan ke login.blade.php
        return view('login');
    }

    public function login(Request $r){

        $r->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $r->email;
        $password = $r->password;

        $check_user = User::where([
            ['email', '=', $email],
            ['password', '=', $password]
        ])->first();
        
        if($check_user){
            Session::put('user', $check_user);
            // mengarahkan ke halaman home
            return redirect(url('/'));
        }else{
            // Session::put('pesan_gagal', 'login gagal');
            return back()->with('pesan_gagal', 'login gagal');
        }
    }
}
