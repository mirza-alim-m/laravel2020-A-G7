<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use DataTables;
use Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $karyawans = Karyawan::paginate(10);
        // return view('karyawan.index', compact('karyawans'));
        if($request->ajax())
        {
            $data = Karyawan::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $a=csrf_field();
                        return '
                        <center>
                    <form action="'.route('karyawans.destroy',$data->id_jenis).'" method="POST" onsubmit=\'return confirm("Aapakah Yakin Menghapus '.$data->Jabatan .' ? ")\'>
                    '.$a.'<input type="hidden" name="_method" value="DELETE">        
                    <a class="btn btn-warning btn-sm" href="/karyawans/'.$data->id_jenis.'">Detail</a> | 
                        <a class="btn btn-success btn-sm" href="/karyawans/'.$data->id_jenis.'/edit">Ubah</a> |                        
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                        </center>
                        ';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('karyawan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png,gif',
            'pdf' => 'required|mimes:pdf'
        ]);

        $gambar = $request->file('gambar')->getClientOriginalName();
        $foto = $request->file('gambar')->storeAs('karyawan/gambar',$gambar);

        $file = $request->file('pdf')->getClientOriginalName();
        $pdf = $request->file('pdf')->storeAs('karyawan/file',$file);

        $karyawan = Karyawan::create([
            'Jabatan' => $request->input('jabatan'),
            'Gaji_Karyawan' => $request->input('gaji'),
            'gambar' => $foto,
            'pdf' => $pdf
            ]);


            return redirect(route('karyawans.index'))->with('success', 'Data Karyawan Baru berhasil ditambahkan');

    }

    public function show(Karyawan $karyawan)
    {
        //
        //$kar = Data::where('idkar',$id)->get();
        //return view('karyawan.data.detail',['daftar'=>$kar]);
        return view('karyawan.detail', compact('karyawan'));

    }


    public function edit(Karyawan $karyawan)
    // ada $id
    {
        return view('karyawan.edit', compact('karyawan'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    // ada $id
    {
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
            $foto = $request->file('gambar')->storeAs('karyawan/gambar',$gambar);
         }
         if ($request->file) {
            //hapus fto lama
            Storage::delete($pdflama);
            //simpan gambar baruige:
            $file = $request->file('file')->getClientOriginalName();
            $pdf = $request->file('file')->storeAs('karyawan/file',$file);
         }

        $karyawan = Karyawan::whereJabatan($id)->update([
            'Gaji_Karyawan' => $request->input('gaji_karyawan'),
            'Jabatan' => $request->input('jabatan')
            ,
            'gambar' => $foto,
            'pdf' => $pdf
            
            
        ]);

        return redirect(route('karyawans.index'))->with('success', 'Data Karyawan berhasil diubah');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Karyawan = Karyawan::findOrfail($id);
        Storage::delete($Karyawan->gambar);
        Storage::delete($Karyawan->pdf);
        Karyawan::find($id)->delete();
        return redirect(route('karyawans.index'))->with('success', 'Data Karyawan berhasil dihapus');
    }
}
