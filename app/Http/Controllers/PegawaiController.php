<?php

namespace App\Http\Controllers;
use App\User;
use App\pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(){
        $users = pegawai::all();

        return view('Pegawai.pegawai',[
            'users' => $users
        ]);
    }


    // EDIT pegawai
    public function edit(Request $r, $user_id){
        $check_user = pegawai::where('id',$user_id)->first();
        if($check_user){
            if ($r->isMethod('post')){
                // return dd($r->post());
                $pekerjaan = $r->pekerjaan;

                $check_pegawai = pegawai::where('id', $user_id)->first();
                // dd($check_biodata);
                // $namafoto = $r->file('foto')->store('img');
                if($check_pegawai){
                    // update biodata
                    $pegawai = pegawai::find($check_pegawai->id);
                    // $biodata->foto = $namafoto;
                    $pegawai->pekerjaan = $pekerjaan;
                    $pegawai->save();
                }else{
                    // insert biodata
                    $pegawai = new pegawai;
                    // $biodata->foto = $namafoto;
                    $pegawai->user_id = $user_id;
                    $pegawai->pekerjaan = $pekerjaan;
                    
                    $pegawai->save();
                }

                return redirect('pegawai')->with('pesan_berhasil', 'pegawai berhasil diubah');
            }
            return view('pegawai.editpegawai',['user' => $check_user]);
            }else{
            return redirect('Pegawai.pegawai')->with('pesan_gagal','id tidak ditemukan');
        }
    }
}
