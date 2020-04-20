@extends('layout.app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div ng-view="" class="ng-scope">
			<div class="card ng-scope">
				<div class="header">
					<h2>Detail Daftar Gaji</h2>
				</div>
				<div class="body">
					@foreach ($daftar as $daftar)
						<div class="form-group">
							<label>Nama Pegawai</label>
							<label>{{$daftar->Penggajian_karyawan['nama']}}}}</label>
						</div>
						<div class="form-group">
							<label>Bagian Kerja </label>
							<label>{{$daftar->Gaji_karyawan['Jabatan']}} </label>
						</div>
						<div class="form-group">
							<label>Jam Lembur </label>
							<label>{{$daftar->jam_lembur}}</label>
						</div>
						<div class="form-group">
							<label>Total Gaji </label>
							<label >{{$daftar->total}}</label>
						</div>
						<div class="form-group">
							<label>Tanggal </label>
							<label >{{$daftar->tanggal}}</label>
						</div>
						<a href="/penggajian" class="btn btn-primary btn-sm">KEMBALI</a>
					@endforeach
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection