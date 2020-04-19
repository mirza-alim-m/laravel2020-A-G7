@extends('layout.app')
@section('content')

<section class="content">
	<div class="container-fluid">
		<div ng-view="" class="ng-scope">
			<div class="card ng-scope">
				<div class="header">
					<h2>Edit Data Karyawan</h2>
				</div>
				<div class="body">
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
</section>
@endsection