@extends('layout.app')
@section('content')
	<!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    
	<!-- <title>Tambah Data</title> -->

	
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
						<strong>Tambah Data karyawan</strong>
					</div>
					<div class="card-body">
					<form action="/karyawan" method="POST">
						{{ csrf_field() }}
							<h3>Isi Data</h3>
							<label>Nama</label>
							<input type="text" name="nama" required placeholder="Ketikan nama"><br>
							<label>Jabatan</label>
							<input type="text" name="jabatan" required placeholder="Masukan Jabatan"><br>
							<label>Jenis Kelamin</label>
							<input type="text" name="jk" required placeholder="laki-laki/perempuan"><br>
							<label>Tanggal Lahir</label>
							<input type="text" name="tl" required placeholder="tttt-bb-hh"><br>
							<label>Nomor HP</label>
							<input type="text" name="nohp" required placeholder="628xxx"><br>
							<label>Alamat</label>
							<input type="text" name="alamat" required placeholder="Masukan Alamat"><br>
							<label>Nomor Rekening</label>
							<input type="text" name="no_rek" required placeholder="Nomor Rekening"><br>
							<button type="submit">Tambah</button>
						</form><br>
						<a href="/karyawan"><button>Kembali</button></a>
					</div>
				</div>
			</div>
		</div>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<!-- <script>
		CKEDITOR.replace( 'content' );
	</script> -->
@endsection