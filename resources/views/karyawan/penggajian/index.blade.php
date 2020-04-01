@extends('layout.app')
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
						<table class="table table-bordered" id="myTable">
							<thead>
								<tr>
									<th scope="col">Nama</th>
									<th scope="col">Gaji Utama</th>
									<th scope="col">Jam Lembur</th>
									<th scope="col">Gaji Total</th>
									<th scope="col">Tanggal Penggajian</th>
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
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
		$(document).ready( function () {
		  $('#myTable').DataTable();
		} );
    </script>

</body>
</html>


@endsection