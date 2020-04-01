@extends('layout.app')
@section('content')


	<div class="container" style="margin-top: 80ox">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>DATA MAHASISWA</strong>
					</div>
					<div class="card-body">
						<a href="{{ route('mahasiswas.create') }}" class="btn btn-md btn-success" style="margin-bottom: 10px">Tambah Data</a>
						<table class="table table-bordered" id="myTable">
							<thead>
								<tr>
									<th scope="col">NIM</th>
									<th scope="col">NAMA</th>
									<th scope="col">KELAS</th>
									<th scope="col">ALAMAT</th>
									<th scope="col">AKSI</th>
								</tr>
							</thead>
							<tbody>
								@foreach($mahasiswas as $mahasiswa)
								<tr>
									<td>{{ $mahasiswa->nim }}</td>
									<td>{{ $mahasiswa->nama }}</td>
									<td>{{ $mahasiswa->kelas }}</td>
									<td>{{ $mahasiswa->alamat }}</td>
									<td class="text-center">
										<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mahasiswas.destroy', $mahasiswa->nim) }}" method="POST">
											<a href="{{ route('mahasiswas.edit', $mahasiswa->nim) }}" class="btn btn-sm btn-primary">EDIT</a>
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