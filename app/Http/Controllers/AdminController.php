<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function _construct(){
      //  $this->middleware('auth');
     $user = $this->middleware('auth');

     
    }
    
    // metodo que llama al index
    public function index(){
        
        $user= \Auth::user()->view;
        if($user == 1) return view('admin.index');
            //return view('admin.index');
     
        return redirect('/')->with('message', 'No ADMIN');
      

    }
}

