<?php

namespace App\Http\Controllers\Api;

use App\User;
use Response;
use App\Biodata;


use Svg\Tag\Rect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

use function PHPSTORM_META\map;

class ApiController extends Controller


{

    // LAPORAN
    public function laporan(Request $r){ //menyambungkung ke route API bukan WEB
        $users = User::whereBetween('created_at', [$r->periode_awal, $r->periode_akhir])->get();
        // dd($r->all());

        if($users){
            return response()->json($users, 200);
        }else{
            return response()->json([
                'code' => 201,
                'message' => 'error',
            ]);
        }
    }

    // BIODATA

    public function detailbiodata($user_id){ //detail biodata di ambil dari route api BUKAN web
        $bio = User::where('id',$user_id)->with('biodata')->first(); //memunculkan data lewat API {{ with('biodata') }} diambil dari fungsi biodata yg ada di model User
        // $users = User::with('biodata')->get();
        // dd($bio);

        if($bio){
            return response()->json([
                'code' => 200,
                'data' => $bio,
            ]);
        }else{
            return response()->json([
                'code' => 201,
                'message' => 'error',
            ]);
        }

    }

    public function hapusbiodata($id){ //ambil id bukan user)id kayak detail
        $bio = Biodata::where('id', $id)->count();

        if($bio == 0){
            return response()->json([
                'code' => 201,
                'message' => 'Error',
            ]);

        }else{
            Biodata::where('id', $id)->delete();
            return response()->json([
                'code' => 200,
                'data' => 'OK',
            ]);
        }
    }

    // USER

    // tambah user API
    public function store(Request $r){

        $vali = Validator::make($r->all(), [
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if($vali->fails()){
            return response()->json([
                'code' => 201,
                'message' => 'eror',

            ]);
        }else{
            $user = new User;
            $user->nama = $r->input('nama');
            $user->email= $r->input('email');
            $user->password = $r->input('password');
            $user->save();

            return response()->json([
                'code' => 200,
                'message' => 'Success',
            ]);
        }
    }

    // edit user API

    public function edit($id){
    $user = User::find($id);
    if($user)
        return response()->json([
            'code' => 200,
            'message' => $user,
        ]);
    }
    
    public function update(Request $r, $id){

        $vali = Validator::make($r->all(), [
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        
            
            $user = User::find($id);
            if($user){
                $user->nama = $r->input('nama');
                $user->email= $r->input('email');
                $user->update();

                return response()->json([
                    'code' => 200,
                    'message' => 'terupdate',
                ]);
            }else{
                return response()->json([
                    'code' => 201,
                    'message' => 'gagal update',
                ]);
            }
        
    }

    // delete
    public function delete($id) {

        $users = User::find($id);
        $users->delete();
        return response()->json([
            'code' => 200,
            'message' => 'berhasil hapus',
        ]);
    }


    // SEACRH
    // 
}
