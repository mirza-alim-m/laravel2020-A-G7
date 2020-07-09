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
                        <h2>Tambah Data karyawan</h2>
                    </div>
                    <div class="body">
					<form action="/karyawan" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
							<h3>Isi Data</h3>
							<div class="form-group">
								<label>Nama</label>
								<input type="text"required placeholder="Ketikan nama" name="nama" class="form-control @error('nama') is-invalid @enderror">
								@error('nama')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label>Jabatan</label>
								<input type="text"required placeholder="Masukan Jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
								@error('jabatan')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<input type="text"required placeholder="laki-laki/perempuan" name="jk" class="form-control @error('jk') is-invalid @enderror">
								@error('jk')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="text"required placeholder="tttt-bb-hh" name="tl" class="form-control @error('tl') is-invalid @enderror">
								@error('tl')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label>Nomor HP</label>
								<input type="number"required placeholder="Masukan Nomor hp" name="nohp" class="form-control @error('nohp') is-invalid @enderror">
								@error('nohp')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text"required placeholder="Masukan Alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>
								@error('alamat')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label>Nomor Rekening</label>
								<input type="number"required placeholder="Masukan Nomor hp" name="no_rek" class="form-control @error('no_rek') is-invalid @enderror">
								@error('no_rek')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
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
							<button type="submit">Tambah</button>
						</form><br>
						<a href="/karyawan"><button>Kembali</button></a>
					</div>
                </div>
            </div>
        </div>
    </section>

@endsection