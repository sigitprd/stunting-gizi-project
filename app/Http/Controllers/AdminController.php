<?php

namespace App\Http\Controllers;

Use Auth;
Use App\User;
Use App\Anggota;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required|digits_between:8,12|numeric',
        ]);

        $getId = Anggota::where('user_id', $id)->first();
        // dd($getId);

        Anggota::where('id_anggota', $getId->id_anggota)
                ->update([
                    'nama_anggota' => $request->nama_anggota,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'nomor_hp' => $request->nomor_hp
                ]);

        $anggotas = Anggota::find($getId->id_anggota);

        User::where('id', $anggotas->user_id)
            ->update([
                'name' => $anggotas->nama_anggota
        ]);

        return redirect()->back();

    }

    public function updateUser(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'email' => 'bail|required|email|string|max:255|unique:users',
            'password_baru' => 'required|min:5',
            // 'password_lama' => 'required|exists:users,password,id,'.$id,
            'konfirmasi_password' => 'required|same:password_baru',
            'password' => ['required', function ($attribute, $value, $fail) {
                                if (!\Hash::check($value, Auth::user()->password)) {
                                    return $fail(__('The current password lama is incorrect.'));
                                }
                            }],
        ]);

        User::where('id', $id)
            ->update([
                'email' => $request->email,
                'password' => bcrypt($request->password_baru)
        ]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
