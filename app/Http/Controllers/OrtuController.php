<?php

namespace App\Http\Controllers;

use Auth;
use App\Kms;
use App\User;
use App\Balita;
use App\Antopometri;

use Illuminate\Http\Request;

class OrtuController extends Controller
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
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nama_ortu' => 'required|string|max:255',
            'alamat_ortu' => 'required',
            'no_hp_ortu' => 'required|digits_between:8,12|numeric',
        ]);

        $getId = Balita::where('user_id', $id)->first();
        // dd($getId);

        Balita::where('id_balita', $getId->id_balita)
                ->update([
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'nama_ortu' => $request->nama_ortu,
                    'alamat_ortu' => $request->alamat_ortu,
                    'no_hp_ortu' => $request->no_hp_ortu
                ]);

        $balita = Balita::find($getId->id_balita);

        User::where('id', $balita->user_id)
            ->update([
                'name' => $balita->nama
        ]);

        return redirect()->back();
    }

    public function updateUser(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'email' => 'bail|required|email|string|max:255|unique:users',
            'password_baru' => 'required|min:5',
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

    public function grafik()
    {
        try {
            // dd($request->all());
            $balita = Balita::where('user_id', Auth::user()->id)->first();
            
            $kms = Kms::rightJoin('balitas', 'kms.id_balita', '=', 'balitas.id_balita')
                        ->select('kms.*', 'balitas.*')
                        ->where('kms.id_balita', '=', $balita->id_balita)
                        ->get();

            // dd($kms);

            //menyiapkan data untuk chart
            //kategori berdasarkan tanggal input
            $categories = [];
            $berat = [];
            $nama = [];
            $statusgizi = [];
            foreach ($kms as $key) {
                $categories[] = $month = date("F",strtotime($key->created_at));
                $berat[] = $key->berat_badan;
                $nama[] = $key->nama;
                $statusgizi[] = $key->status_gizi;
            }
            // dd($categories . ' ' . $berat . ' ' . $statusgizi . ' ' . $nama);
            if(!empty($nama))
                $nama = $nama[0];
            else
                $nama = "";
            // dd($statusgizi);
            return view('user.d_grafik', compact('kms', 'categories', 'berat', 'nama', 'statusgizi'));
            // return response()->json(['kms' => $kms->all(), 'categories' => $categories, 'berat' => $berat, 'nama' => $nama, 'statusgizi' => $statusgizi], 200);
        } catch (Exception $e) {
            // dd($e);
            return $e;
        }
    }

    public function akunUser()
    {
        if(Auth::user()->role = "ortu")
        {
            $balita = Balita::where('user_id', Auth::user()->id)->first();
            $user = User::find(Auth::user()->id);

            // dd($user);
            return view('user.d_akun', compact('balita', 'user'));
        }
    }
}
