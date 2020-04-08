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
						<a href="{{ route('karyawans.create') }}" class="btn btn-md btn-success" style="margin-bottom: 10px">Tambah Data</a>
						<table class="table table-bordered" id="myTable">
							<thead>
								<tr>
									<th scope="col">JABATAN</th>
									<th scope="col">GAJI</th>
								</tr>
							</thead>
							<tbody>
								@foreach($karyawans as $karyawan)
								<tr>
									<td>{{ $karyawan->Jabatan }}</td>
									<td>{{ $karyawan->Gaji_Karyawan }}</td>
									<td class="text-center">
										<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('karyawans.destroy', $karyawan->Jabatan) }}" method="POST">
											<a href="{{ route('karyawans.edit', $karyawan->id_jenis) }}" class="btn btn-sm btn-primary">EDIT</a>
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{ $karyawans->links() }}
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