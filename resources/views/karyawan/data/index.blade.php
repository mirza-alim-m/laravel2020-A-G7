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
					<a href="/karyawan/create" class="btn btn-success">Tambah Data</a>
					<br>
					<table id="example" class="table table-bordered table-striped">
						<thead >
							<tr style="background-color: #20a8d8; color: #2f353a; ">
								<th style="text-align: center">NO</th>
								<th style="text-align: center">Nama</th>
								<th style="text-align: center">Jabatan</th>
								<th style="text-align: center">Jenis Kelamin</th>
								<th style="width: 10%; text-align: center">Tanggal Lahir</th>
								<th style="text-align: center">Nomor HP</th>
								<th style="text-align: center">Alamat</th>
								<th style="text-align: center" >Nomor Rekening</th>
								<th style="text-align: center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $k) 
								<tr>
								<td >{{ $k->idkar  }}</td>
								<td >{{ $k->nama  }}</td>
								<td >{{ $k->jabatan  }}</td>
								<td >{{ $k->jk  }}</td>
								<td style="text-align: center" >{{ $k->tl  }}</td>
								<td >{{ $k->nohp  }}</td>
								<td >{{ $k->alamat  }}</td>
								<td >{{ $k->no_rek  }}</td>

								<td style="width: 13%">
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
						{{ $data->links() }}

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