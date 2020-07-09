@extends('layout.app')
@section('content')
	<!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    
	<!-- <title>Tambah Data</title> -->

	<section class="content">
        <div class="container-fluid">
            <div ng-view="" class="ng-scope">
                <div class="card ng-scope">
                    <div class="header">
                        <h2>Tambah Daftar Gaji</h2>
                    </div>
                    <div class="body">
						<form action="{{ route('penggajian.store') }}" method="POST"enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Nama Pegawai</label>
								<select name="nama">
									<option value="">Pilih karyawan</option>
									@foreach ($karyawan as $k)
										<option value="{{$k->idkar}}"> {{$k->nama}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Bagian Kerja </label>
								<select name="utama" id="">
									<option value="">Pilih Bagaian Kerja</option>
									@foreach ($utama as $k)
										<option value="{{$k->id_jenis}}"> {{$k->Jabatan}} | {{$k->Gaji_Karyawan}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Jam Lembur </label>
								<input type="text" name="lembur" required placeholder="masukan jam lembur...">
							</div>
							<div class="form-group">
								<label>Total Gaji </label>
								<input type="text" name="total" required placeholder="masukan total gaji...">
							</div>
							<div class="form-group">
								<label>Tanggal </label>
								<input type="text" name="tanggal" required placeholder="masukan tanggal (TTTT-BB-HH)">
							</div>
							<div class="form-group">
								<label>Gambar :</label>
								<input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
								@error('gambar')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label>Pdf :</label>
								<input type="file" name="pdf" class="form-control-file @error('pdf') is-invalid @enderror">
								@error('pdf')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							<button type="submit" class="btn btn-success">SAVE</button>
							<button type="reset" class="btn btn-warning">RESET</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </section>
@endsection