@extends('layout.app')
@section('content')


	<div class="container" style="margin-top: 80ox">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong>DATA KARYAWAN</strong>
					</div>
					<div class="card-body">
					<a href="/karyawan/create"><button>Tambah Data</button></a>
					<br>
					<table id="example" class="table table-striped">
						<thead >
							<tr style="text-align: center; background-color: #20a8d8; color: #2f353a;">
							<th>NO karyawan</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Jenis Kelamin</th>
							<th>Tanggal Lahir</th>
							<th>Nomor HP</th>
							<th>Alamat</th>
							<th>Nomor Rekening</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
							@foreach ($data as $k) 
								<tr>
								<td >{{ $k->idkar  }}</td>
								<td >{{ $k->nama  }}</td>
								<td >{{ $k->jabatan  }}</td>
								<td >{{ $k->jk  }}</td>
								<td >{{ $k->tl  }}</td>
								<td >{{ $k->nohp  }}</td>
								<td >{{ $k->alamat  }}</td>
								<td >{{ $k->no_rek  }}</td>

								<td >
								<form action="{{route('karyawan.destroy', $k->idkar)}}" method="POST" onsubmit='return confirm("Aapakah Yakin Menghapus {{ $k->nama  }} ? ")'> | 
									<a  class="btn btn-warning  btn-sm" href="/karyawan/{{ $k->idkar  }}/edit">Ubah</a> |
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger  btn-sm">Hapus</button>
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