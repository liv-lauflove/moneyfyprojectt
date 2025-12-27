<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }

    function loginpost(Request $req){
        $req->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $data = $req->input();
        print_r($data);

    }
}
