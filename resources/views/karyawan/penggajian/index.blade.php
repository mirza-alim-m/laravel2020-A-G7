@extends('layout.app')
@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection

@section('content')

<section class="content">
	<div class="container-fluid">
		<div ng-view="" class="ng-scope">
			<div class="card ng-scope">
				<div class="header">
					<h2>GAJI KARYAWAN</h2>
				</div>
				<div class="body">
					<a href="{{ route('penggajian.create') }}" class="btn btn-md btn-success" style="margin-bottom: 10px">Tambah Data</a>
					<br><br>
					<table id="example" class="table table-bordered table-striped">
						<thead >
							<tr style="background-color: #20a8d8; color: #2f353a; ">
								<th scope="col">Nama</th>
									<th scope="col">Gaji Utama</th>
									<th scope="col">Jam Lembur</th>
									<th scope="col">Gaji Total</th>
									<th scope="col">Tanggal Penggajian</th>
									<th scope="col">Aksi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready( function () {
			$('#example').DataTable(
			{processing: true,
			serverSide: true,
			ajax: {
			url: "{{ route('penggajian.index') }}",
			},
			columns: [
				{ data: 'nama', name: 'nama' },
				{ data: 'gaji', name: 'gaji' },
				{ data: 'jam_lembur', name: 'jam_lembur' },
				{ data: 'total', name: 'total' },
				{ data: 'tanggal', name: 'tanggal' },
				{ data: 'action', name: 'action', orderable : false, searchable: false}
			]}
			);
		});
</script>	
@endsection
{{-- 
@extends('layout.app')
@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection

@section('content')

	<div class="container" style="margin-top: 80ox">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>DATA GAJI KARYAWAN</strong>
					</div>
					<div class="card-body">
						<a href="{{ route('penggajian.create') }}" class="btn btn-md btn-success" style="margin-bottom: 10px">Tambah Data</a>
						<table class="table table-bordered" id="example">
							<thead>
								<tr>
									<th scope="col">Nama</th>
									<th scope="col">Gaji Utama</th>
									<th scope="col">Jam Lembur</th>
									<th scope="col">Gaji Total</th>
									<th scope="col">Tanggal Penggajian</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($penggajian as $karyawan)
								<tr>
									<td>{{ $karyawan->Penggajian_karyawan['nama'] }}</td>
									<td>{{ $karyawan->Gaji_karyawan['Gaji_Karyawan'] }}</td>
									<td>{{ $karyawan->jam_lembur }}</td>
									<td>{{ $karyawan->total }}</td>
									<td>{{ $karyawan->tanggal }}</td>
									<td class="text-center">
										<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('karyawans.destroy', $karyawan->id_gaji) }}" method="POST">
											<a href="{{ route('karyawans.edit', $karyawan->id_gaji) }}" class="btn btn-sm btn-primary">EDIT</a>
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection


@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready( function () {
			$('#example').DataTable(
			// {processing: true,
			// serverSide: true,
			// ajax: {
			// url: "{{ route('karyawan.index') }}",
			// },
			// columns: [
			// 	{ data: 'nama', name: 'nama' },
			// 	{ data: 'gaji', name: 'gaji' },
			// 	{ data: 'jam_lembur', name: 'jam_lembur' },
			// 	{ data: 'total', name: 'total' },
			// 	{ data: 'tanggal', name: 'tanggal' },
			// 	{ data: 'action', name: 'action', orderable : false, searchable: false}
			// ]}
			);
		});
</script>	 --}}