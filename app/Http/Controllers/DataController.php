<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use DataTables;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function ajax()
    {
            $data = Data::latest()->get();
            return DataTables::of($data)
                    ->make(true);
    }
     public function index(Request $request)
    {
        //
        // $karyawan = Data::paginate(10); 
        // return view('karyawan.data.index',['data'=>$karyawan]);
        if($request->ajax())
        {
            $data = Data::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $a=csrf_field();
                        return '
                        <center>
                    <form action="'.route('karyawan.destroy',$data->idkar).'" method="POST" onsubmit=\'return confirm("Aapakah Yakin Menghapus '.$data->nama .' ? ")\'>
                    '.$a.'<input type="hidden" name="_method" value="DELETE">        
                    <a class="btn btn-warning btn-sm" href="/karyawan/'.$data->idkar.'">Detail</a> | 
                        <a class="btn btn-success btn-sm" href="/karyawan/'.$data->idkar.'/edit">Ubah</a> |                        
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                        </center>
                        ';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('karyawan.data.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('karyawan.data.create');
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
        $jk= $request->input("jk");
        $tl= $request->input("tl");
        $nohp= $request->input("nohp");
        $alamat= $request->input("alamat");
        $no_rek= $request->input("no_rek");
        $jabatan= $request->input("jabatan");
        Data::create(['nama'=>$nama,'jk'=>$jk,'tl'=>$tl,'nohp'=>$nohp,'alamat'=>$alamat,'no_rek'=>$no_rek,'jabatan'=>$jabatan]);
        return redirect("/karyawan");
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
        //$kar = Data::where('idkar',$id)->get();
        //return view('karyawan.data.detail',['daftar'=>$kar]);
        $kar = Data::where('idkar',$id)->get();
        return view('karyawan.data.detail',['daftar'=>$kar]);
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
        $kar = Data::where('idkar',$id)->get();
        return view('karyawan.data.edit',['daftar'=>$kar]);
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
        $nama= $request->input("nama");
        $jk= $request->input("jk");
        $tl= $request->input("tl");
        $nohp= $request->input("nohp");
        $alamat= $request->input("alamat");
        $no_rek= $request->input("no_rek");
        $jabatan= $request->input("jabatan");
        Data::where('idkar',$id)->update(['nama'=>$nama,'jk'=>$jk,'tl'=>$tl,'nohp'=>$nohp,'alamat'=>$alamat,'no_rek'=>$no_rek,'jabatan'=>$jabatan]);
        return redirect("/karyawan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Data::find($id)->delete();

        return redirect('/karyawan');
    }
}
