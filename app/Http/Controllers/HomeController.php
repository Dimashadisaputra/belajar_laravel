<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class HomeController extends Controller
{
    //  
    public function index(){
        $session = Session::get('user');
        // $users = User::where('id', $session->id)->get();
        $users = User::all();  

        return view('welcome', ['users'=>$users]);
    }
}
