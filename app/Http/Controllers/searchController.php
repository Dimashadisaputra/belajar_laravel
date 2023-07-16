<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class searchController extends Controller
{
    // SEARCH FULL API

    public function index(Request $r){
        if ($r->has('q')){
            $q=$r->q;
            $res = User::where(('nama'),'like','%'.$q.'%')->get();
    
            return response()->json(['data' => $res]);
        }else{
            return view ('Search.search');
        }
    }
}
