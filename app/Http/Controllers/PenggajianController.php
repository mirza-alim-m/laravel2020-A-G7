<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penggajian;
use App\Data;
use App\Karyawan;


class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggajian = Penggajian::latest()->get();
        return view('karyawan.penggajian.index', compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Data::all(); 
        $utama = Karyawan::latest()->get();
        return view('karyawan.penggajian.create',['karyawan'=>$karyawan, 'utama'=>$utama]);
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
        $nama= $request->input("nama");
        $utama= $request->input("utama");
        $lembur= $request->input("lembur");
        $totsl= $request->input("total");
        $tanggal= $request->input("tanggal");
        Penggajian::create(['idkar'=>$nama,'id_jenis'=>$utama,'jam_lembur'=>$lembur,'total'=>$totsl,'tanggal'=>$tanggal]);
        return redirect("/penggajian");
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
        $id = Penggajian::where('id_gaji',$id)->get();
        return view('karyawan.penggajian.edit',['daftar'=>$id]);
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
        Penggajian::find($id)->delete();

        return redirect('/penggajian');
    }
}
