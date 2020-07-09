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
                        <h2>Tambah Kategori Gaji</h2>
                    </div>
                    <div class="body">
						<form action="{{ route('karyawans.store') }}" method="POST"enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>JABATAN</label>
								<input type="text" name="jabatan" placeholder="Masukan Jabatan" class="form-control" required>
							</div>
							<div class="form-group">
								<label>GAJI KARYAWAN</label>
								<input type="text" name="gaji" placeholder="Masukan Gaji" class="form-control" required>
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