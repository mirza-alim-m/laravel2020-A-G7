@extends('layout.app')
@section('content')
<section class="content">
        <div class="container-fluid">
            <div ng-view="" class="ng-scope">
                <div class="card ng-scope">
                    <div class="header">
                        <h2>Detail Kategori Gaji</h2>
                    </div>
                    <div class="body">
							<div class="form-group">
								<label>JABATAN</label>
								<label >{{ $karyawan->Jabatan }}</label>
							</div>
							<div class="form-group">
								<label>GAJI</label>
								<label >{{ $karyawan->Gaji_Karyawan }}</label>
                            </div>
                            <label>Gambar: </label>
                            <br>
                            <img width="25%" src="{{asset('/storage/'.$karyawan->gambar)}}"></center>
                            <br>
                            <label>PDF: </label>    
                            @if($karyawan->pdf)
                                    <a href="{{ asset('/storage/' . $karyawan->pdf) }}" target="_blank">Download PDF</a>
                                @else
                                    <a>Pdf Not Found</a>
                                @endif
                            <div class="form-group">
								<label>Penerima Gaji</label>
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($karyawan->Gaji as $d)    
                                        <tr>
                                            <th >{{$d->Penggajian_karyawan['nama']}}</th>
                                            <th >{{$d->tanggal}}</th>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                

                            </div>

							<a href="/karyawans" class="btn btn-primary btn-sm">KEMBALI</a>
					</div>
                </div>
            </div>
        </div>
    </section>

@endsection