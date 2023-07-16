<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// nyambung ke App/user (itu model)
use App\User;
use App\Biodata;
use Image;
use Barryvdh\DomPDF\Facade\Pdf;
use League\Flysystem\File;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use User as GlobalUser;

class BiodataController extends Controller
{
    // index biodata pengguna
    public function index(){
        $users = Biodata::all();

        return view('Biodata.Biodata',[
            'users' => $users
        ]);
    }

    //Tambah Biodata
    public function tambah(Request $r){
        $users = User::all();
        if ($r->isMethod('post')){

            $r->validate([
                'age' => 'required',
                'alamat' => 'required',
                'phone' => 'required'
            ]);

            $user_id = $r->user_id;
            $age = $r->age;
            $bhirtday = $r->bhirtday;
            $alamat = $r->alamat;
            $phone = $r->phone;
            $gender = $r->gender;
            if(!empty($r->file('foto'))){
                $foto = time().$r->file('foto')->getClientOriginalName();
                $r->file('foto')->move('images/', $foto);
                $img = Image::make(public_path().'/images/'.$foto)->resize(300,300);
            }else{
              $foto = '';
            }

            $check_user_id = User::where('id', $user_id)->count();
            $check_biodata = Biodata::where('user_id', $user_id)->count();

            if ($check_user_id == 0){
                return back ()->with ('pesan gagal', 'pengguna tidak ditemuka');
            } else if ($check_biodata >= 1){
                return back ()->with ('pesan berhasil', 'sudah ditambahkan');
            } else {
                // menambah biodata 
                $biodata = new Biodata;
                $biodata->user_id = $user_id;
                $biodata->foto = $foto;
                $biodata->age = $age;
                $biodata->bhirtday = $bhirtday;
                $biodata->alamat = $alamat;
                $biodata->phone = $phone;
                $biodata->gender = $gender;
                $biodata->save();

                return redirect('/biodata')->with ('pesan berhasil','berhasil ditambahkan');
            }
            
        }

        return view('Biodata.tambahbiodata',[
            'users' => $users
        ]);
    }


    // edit biodata pengguna
    public function edit(Request $r, $user_id){
        $check_user = Biodata::where('id',$user_id)->first();
        if($check_user){
            if ($r->isMethod('post')){
                // return dd($r->post());
                $age = $r->age;
                $bhirtday = $r->bhirtday;
                $alamat = $r->alamat;
                $phone = $r->phone;
                $gender = $r->gender;
                // $foto = time().$r->file('foto')->getClientOriginalName() ;
                // $r->file('foto')->move('images/', $foto);
                // $img = Image::make(public_path().'/images/'.$foto)->resize(300,300);
                if(!empty($r->file('foto'))){
                    $foto = time().$r->file('foto')->getClientOriginalName();
                    $r->file('foto')->move('images/', $foto);
                    $img = Image::make(public_path().'/images/'.$foto)->resize(300,300);
                }else{
                  $foto = $check_user->foto;
                }

                $check_biodata = Biodata::where('id', $user_id)->first();
                // dd($check_biodata);
                // $namafoto = $r->file('foto')->store('img');
                if($check_biodata){
                    // update biodata
                    $biodata = Biodata::find($check_biodata->id);
                    $biodata->foto = $foto;
                    $biodata->age = $age;
                    $biodata->bhirtday = $bhirtday;
                    $biodata->alamat = $alamat;
                    $biodata->phone = $phone;
                    $biodata->gender = $gender;
                    $biodata->save();
                }else{
                    // insert biodata
                    $biodata = new Biodata;
                    // $biodata->foto = $namafoto;
                    $biodata->foto = $foto;
                    $biodata->user_id = $user_id;
                    $biodata->age = $age;
                    $biodata->bhirtday = $bhirtday;
                    $biodata->alamat = $alamat;
                    $biodata->phone = $phone;
                    $biodata->gender = $gender;
                    $biodata->save();
                }

                return redirect('biodata')->with('pesan_berhasil', 'biodata berhasil diubah');
            }
            return view('Biodata.editbiodata',['user' => $check_user]);
            }else{
            return redirect('Biodata.Biodata')->with('pesan_gagal','id tidak ditemukan');
        }
    }

    // hapus biodata
    public function hapus($id){
        $check_biodata = Biodata::where('id', $id)->count();
        if($check_biodata == 0) {
            return redirect('/biodata')->with('pesan_gagal', 'biodata tidak ditemukan');
        }else {
            Biodata::where('id', $id)->delete();

            return redirect('biodata')->with('pesan_berhasil', 'terhapus');
        }
    }


    // cetak pdf biodata user
    public function cetakbiodatauser($id){
        $users = Biodata::where('id',$id)->first();
        // dd($users);

        
        $pdf = Pdf::loadView('Biodata.cetakbiodatauser', compact('users'));
		// $customPaper = array(0, 0, 793.7007874, 340);
		// $customPaper = array(0, 0, 793.7007874, 360);
		// $pdf->setPaper($customPaper);
		// return $pdf->download('lab.pdf');
		return $pdf->stream();
    }

    // cetak biodata
    public function cetakbiodata(){
        $users = Biodata::all();

        $pdf = Pdf::loadView('Biodata.cetakbiodata', compact('users'));
        return $pdf->stream();
    }

    public function detailbiodata($id){
        return view ('Biodata.detailbiodata');
    }
}