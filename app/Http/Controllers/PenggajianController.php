<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penggajian;
use App\Data;
use App\Karyawan;
use DataTables;
use Storage;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $penggajian = Penggajian::paginate(10);
        // return view('karyawan.penggajian.index', compact('penggajian'));
        if($request->ajax())
        {
            $data = Penggajian::latest()->get();
            return DataTables::of($data)
                    ->addColumn('nama', function($data){
                        $a=$data->Penggajian_karyawan['nama'];
                        return $a;                        ;
                    })
                    ->rawColumns(['nama'])
                    ->addColumn('gaji', function($data){
                        $a=$data->Gaji_karyawan['Gaji_Karyawan'];
                        return $a;                        ;
                    })
                    ->rawColumns(['gaji'])
                    ->addColumn('action', function($data){
                        $a=csrf_field();
                        return '
                        <center>
                    <form action="'.route('penggajian.destroy',$data->id_gaji).'" method="POST" onsubmit=\'return confirm("Aapakah Yakin Menghapus '.$data->Penggajian_karyawan['nama']  .' dengan total gaji  '. $data->total  .' ? ")\'>
                    '.$a.'<input type="hidden" name="_method" value="DELETE">        
                    <a class="btn btn-warning btn-sm" href="/penggajian/'.$data->id_gaji.'">Detail</a> | 
                        <a class="btn btn-success btn-sm" href="/penggajian/'.$data->id_gaji.'/edit">Ubah</a> |                        
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                        </center>
                        ';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('karyawan.penggajian.index');
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
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png,gif',
            'pdf' => 'required|mimes:pdf'
        ]);

        $gambar = $request->file('gambar')->getClientOriginalName();
        $foto = $request->file('gambar')->storeAs('penggajian/gambar',$gambar);

        $file = $request->file('pdf')->getClientOriginalName();
        $pdf = $request->file('pdf')->storeAs('penggajian/file',$file);


        $nama= $request->input("nama");
        $utama= $request->input("utama");
        $lembur= $request->input("lembur");
        $totsl= $request->input("total");
        $tanggal= $request->input("tanggal");
        Penggajian::create(['idkar'=>$nama,'id_jenis'=>$utama,'jam_lembur'=>$lembur,'total'=>$totsl,'tanggal'=>$tanggal,
        'gambar' => $foto,
        'pdf' => $pdf]);
        return redirect("/penggajian")->with('success', 'Data Penggajian Baru berhasil ditambahkan');
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
        $id = Penggajian::where('id_gaji',$id)->get();
        return view('karyawan.penggajian.detail',['daftar'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Data::all(); 
        $utama = Karyawan::latest()->get();
        $id = Penggajian::where('id_gaji',$id)->get();
        return view('karyawan.penggajian.edit',['daftar'=>$id,'karyawan'=>$karyawan, 'utama'=>$utama]);
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
        //cek ada update gambar atu tidak
        if ($request->gambar) {
            //hapus fto lama
            Storage::delete($fotolama);
            //simpan gambar baruige:
            $gambar = $request->file('gambar')->getClientOriginalName();
            $foto = $request->file('gambar')->storeAs('penggajian/gambar',$gambar);
         }
         if ($request->file) {
            //hapus fto lama
            Storage::delete($pdflama);
            //simpan gambar baruige:
            $file = $request->file('file')->getClientOriginalName();
            $pdf = $request->file('file')->storeAs('penggajian/file',$file);
         }
        $nama= $request->input("nama");
        $utama= $request->input("utama");
        $lembur= $request->input("lembur");
        $totsl= $request->input("total");
        $tanggal= $request->input("tanggal");
        Penggajian::where('id_gaji',$id)->update(['idkar'=>$nama,'id_jenis'=>$utama,'jam_lembur'=>$lembur,'total'=>$totsl,'tanggal'=>$tanggal,
        'gambar' => $foto,
        'pdf' => $pdf
        ]);
        return redirect("/penggajian")->with('success', 'Data Penggajian berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Karyawan = Penggajian::findOrfail($id);
        Storage::delete($Karyawan->gambar);
        Storage::delete($Karyawan->pdf);
        Penggajian::find($id)->delete();

        return redirect('/penggajian')->with('success', 'Data Penggajian berhasil dihapus');;
    }
}
