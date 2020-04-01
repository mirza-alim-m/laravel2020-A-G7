@extends('layout.app')
@section('content')

	<div class="container" style="margin-top: 80px">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
						<strong>Edit Data Karyawan</strong>
					</div>
					<div class="card-body">
					@foreach ($daftar as $k)
					<form action="/karyawan/{{$k->idkar}}" method="POST">
					{{ csrf_field() }}
					@method('PUT')
						<h3>Ubah Data</h3>
						<label>Nama</label>
					<input type="text" name="nama" required placeholder="Ketikan nama" value="{{$k->nama}}"><br>
						<label>Jabatan</label>
						<input type="text" name="jabatan" required placeholder="Masukan Jabatan" value="{{$k->jabatan}}"><br>
						<label>Jenis Kelamin</label>
						<input type="text" name="jk" required placeholder="laki-laki/perempuan" value="{{$k->jk}}"><br>
						<label>Tanggal Lahir</label>
						<input type="text" name="tl" required placeholder="tttt-bb-hh" value="{{$k->tl}}"><br>
						<label>Nomor HP</label>
						<input type="text" name="nohp" required placeholder="628xxx" value="{{$k->nohp}}"><br>
						<label>Alamat</label>
						<input type="text" name="alamat" required placeholder="Masukan Alamat" value="{{$k->alamat}}"><br>
						<label>Nomor Rekening</label>
						<input type="text" name="no_rek" required placeholder="Nomor Rekening"value="{{$k->no_rek}}"><br>
						<button type="submit">Simpan</button>
						@endforeach
					</form><br>
					<a href="/karyawan"><button>Kembali</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'content' );
	</script>
</body>
</html>

@endsection