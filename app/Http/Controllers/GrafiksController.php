<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kms;
use App\Balita;
use App\Antopometri;

use DB;

class GrafiksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kms = DB::table('kms')->leftJoin('balitas', 'kms.id_balita', '=', 'balitas.id_balita')
                    ->select(DB::raw('balitas.id_balita, balitas.nama, balitas.jenis_kelamin, MAX(kms.id) as id, MAX(kms.umur) as umur, MAX(kms.berat_badan) as berat_badan, MAX(kms. id_antopometri) as is_antopometri, MAX(kms.z_score) as z_score, MIN(kms.status_gizi) as status_gizi'))
                    ->groupBy('balitas.id_balita')
                    ->orderBy('balitas.nama', 'ASC')
                    ->get();
        
        // dd($kms);
        $balitas = Balita::all();
        return view('admin.d_grafik', compact('kms', 'balitas'));
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
        //
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

    public function chart(Request $request)
    {
        try {
            // dd($request->all());
            $kms = Kms::rightJoin('balitas', 'kms.id_balita', '=', 'balitas.id_balita')
                        ->select('kms.*', 'balitas.*')
                        ->where('kms.id_balita', '=', $request->id)
                        ->get();

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
            // dd($kms);
            return response()->json(['kms' => $kms->all(), 'categories' => $categories, 'berat' => $berat, 'nama' => $nama, 'statusgizi' => $statusgizi], 200);
        } catch (Exception $e) {
            // dd($e);
            return $e;
        }
        
    }
}
