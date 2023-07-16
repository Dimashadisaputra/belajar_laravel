<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// USE JANGAN SAMPE LUPA BODOH
// SESSION JANGAN SAMPE LUPA BODOH
use Session;

class UserController extends Controller
{   
    public function index(){
        $session = Session::get('user');
        // $users = User::where('id', $session->id)->get();
        $users = User::all();  

        return view('User.user', ['users'=>$users]); //pake folser titik kalo dicontroller
        // return view('user', ['users'=>$users]);
    }

    // tambah
    public function tambah(Request $r) {
        if ($r->isMethod('post')) {

        $r->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $nama = $r->nama;
        $email = $r->email;
        $password = $r->password;

            $check_email = User::where('email', $email)->count();
            if($check_email >= 1) {
                return back()->with('pesan_gagal', 'email sudah terdaftar');
            } else {
                // insert db
                $user = new User;
                $user->nama = $nama;
                $user->email = $email;
                $user->password = $password;
                $user->save();
    
                return redirect('/user')->with('pesan_berhasil', 'berhasil terdaftar');
            }
        }
        return view('User.tambahUser');
    }
    // untuk edit user
    public function edit(Request $r, $id){
        $user = User::find($id);
        if($user !== null){
            if ($r->isMethod('post')){
                
                $r->validate([
                    'nama' => 'required',
                    'email' => 'required'
                ]);
                
                $user->nama =$r->nama;
                $user->email =$r->email;
                $user->save();

                return redirect('/')->with('pesan_berhasil', 'penggunaberhasil');
            }

            // return view('user.edit', [ kalo ada didalem folder gtu pake titik bukan garing
            return view('User.editUser', [
                'user' => $user
            ]);
        }else{
            return redirect('/user')->with('pesan_gagal', 'pengguna'. $id .'tidak ada');
        }
    }

    public function hapus($id){
        $session = Session::get('user');
        if(User::find($id) !== null && $id != $session->id) {
            // menghapus user
            User::where('id',$id)->delete();
            // delete() ridak mengikuti function

            return redirect(url('/user'))->with('pesan_berhasil', 'pengguna dihapus');
        }else{
            return redirect(url('/user'))->with('pesan_gagal', 'pengguna tidak ditemuka');
        }
    }

}
