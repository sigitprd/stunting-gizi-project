<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Anggota;
use App\Balita;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function index()
    {
        return redirect('/login');
    }

    public function login()
    {
        return view('login.login');
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function akunAdmin()
    {
        if(Auth::user()->role = "admin")
        {
            $anggota = Anggota::leftJoin('jabatans', 'anggotas.id_jabatan', '=', 'jabatans.id')
                                ->select('anggotas.*', 'jabatans.nama_jabatan')
                                ->where('anggotas.user_id', Auth::user()->id)
                                ->first();
            $user = User::find(Auth::user()->id);

            $current_password = Auth::User()->password;           
            if(Hash::check("rahasia", $current_password))
            {           
                // $user_id = Auth::User()->id;                       
                // $obj_user = User::find($user_id);
                // $obj_user->password = Hash::make($request_data['password']);
                // $obj_user->save(); 
                // return "ok";
            }

            return view('admin.d_akun', compact('anggota', 'user'));
        }
    }

    public function akunUser()
    {
        if(Auth::user()->role = "ortu")
        {
            $balita = Balita::where('user_id', Auth::user()->id)->get();
            $user = User::find(Auth::user()->id);

            dd($user);
            return view('user.d_akun', compact('balita', 'user'));
        }
    }

    public function anggota()
    {
        return view('admin.d_anggota');
    }

    public function balita()
    {
        return view('admin.d_balita');
    }

    public function kms()
    {
        return view('admin.d_kms');
    }

    public function user()
    {
        return view('user.index');
    }
}
