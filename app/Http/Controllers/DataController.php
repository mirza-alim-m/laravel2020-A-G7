<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use DataTables;
use Storage;


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
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png,gif',
            'pdf' => 'required|mimes:pdf'
        ]);

        $gambar = $request->file('gambar')->getClientOriginalName();
        $foto = $request->file('gambar')->storeAs('data/gambar',$gambar);

        $file = $request->file('pdf')->getClientOriginalName();
        $pdf = $request->file('pdf')->storeAs('data/file',$file);

        
        $nama= $request->input("nama");
        $jk= $request->input("jk");
        $tl= $request->input("tl");
        $nohp= $request->input("nohp");
        $alamat= $request->input("alamat");
        $no_rek= $request->input("no_rek");
        $jabatan= $request->input("jabatan");
        Data::create(['nama'=>$nama,'jk'=>$jk,'tl'=>$tl,'nohp'=>$nohp,'alamat'=>$alamat,'no_rek'=>$no_rek,'jabatan'=>$jabatan,
        'gambar' => $foto,
        'pdf' => $pdf]);
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
        $validatedData = $request->validate([
            'gambar' => 'image|mimes:jpeg,jpg,png,gif',
            'file' => 'mimes:pdf'
        ]);
        $fotolama =$request->gambarlama;
        $pdflama =$request->pdflama;
        $foto=$fotolama;
        $pdf=$pdflama;
        if ($request->gambar) {
            //hapus fto lama
            Storage::delete($fotolama);
            //simpan gambar baruige:
            $gambar = $request->file('gambar')->getClientOriginalName();
            $foto = $request->file('gambar')->storeAs('data/gambar',$gambar);
         }
         if ($request->file) {
            //hapus fto lama
            Storage::delete($pdflama);
            //simpan gambar baruige:
            $file = $request->file('file')->getClientOriginalName();
            $pdf = $request->file('file')->storeAs('data/file',$file);
         }

        
        $nama= $request->input("nama");
        $jk= $request->input("jk");
        $tl= $request->input("tl");
        $nohp= $request->input("nohp");
        $alamat= $request->input("alamat");
        $no_rek= $request->input("no_rek");
        $jabatan= $request->input("jabatan");
        Data::where('idkar',$id)->update(['nama'=>$nama,'jk'=>$jk,'tl'=>$tl,'nohp'=>$nohp,'alamat'=>$alamat,'no_rek'=>$no_rek,'jabatan'=>$jabatan,
        'gambar' => $foto,
        'pdf' => $pdf]);
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
        
        $Karyawan = Data::findOrfail($id);
        Storage::delete($Karyawan->gambar);
        Storage::delete($Karyawan->pdf);
        Data::find($id)->delete();

        return redirect('/karyawan');
    }
}
