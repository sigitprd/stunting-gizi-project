<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::user()){
            return redirect('/index');
        } else{
            return view('login.login');
        }
        
    }  
    
    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
        {
            if(Auth::user()->role == "admin" || Auth::user()->role == "superadmin")
            {
                return redirect()->route('admin');
            }
            else 
            {
                return redirect()->route('ortu');
            }
        }
        return redirect()->back()->withInput()->with('error', 'Invalid Account!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
