<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    //
    public function index() {
        // menyambungkan keview
        return view('register');
    }

    public function register(Request $r) {
        $r->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required',
        ]);

        $email = $r->email;
        $nama = $r->nama;
        $password = $r->password;
        $confirmpassword = $r->confirmpassword;

        if ($confirmpassword != $password) {
            return back()->with('pesan_gagal', 'password tidak sesuai');
        } else {
            $check_email = User::where('email', $email)->count();
            if($check_email >= 1) {
                return back()->with('pesan_gagal', 'email sudah terdaftar');
            } else {
                $user = new User;
                $user->nama = $nama;
                $user->email = $email;
                $user->password = $password;
                $user->save();
    
                // return back()->with('pesan_berhasil', 'berhasil terdaftar'); 
                return redirect(url('/login'))->with('pesan_berhasil', 'sudah terdaftar');
            }
        }
    }
}