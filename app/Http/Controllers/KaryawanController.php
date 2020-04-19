<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use DataTables;


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
        $karyawan = Karyawan::create([
            'Jabatan' => $request->input('jabatan'),
            'Gaji_Karyawan' => $request->input('gaji'),
            ]);

            return redirect(route('karyawans.index'));

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
    public function update(Request $request, $karyawan)
    // ada $id
    {
        $karyawan = Karyawan::whereJabatan($karyawan)->update([
            'Gaji_Karyawan' => $request->input('gaji_karyawan'),
            
        ]);

        return redirect(route('karyawans.index'));
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
        $karyawan = Karyawan::whereJabatan($id);
        $karyawan->delete();

        return redirect(route('karyawans.index'));
    }
}
