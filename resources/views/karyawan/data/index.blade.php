@extends('layout.app')
@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection

@section('content')

<section class="content">
	<div class="container-fluid">
		<div ng-view="" class="ng-scope">
			<div class="card ng-scope">
				@if(Session::has('success'))
				<div class="alert alert-primary">
					<strong>Success: </strong>{{ Session::get('success') }}
					<button type="button" class="close" data-dismiss="alert">×</button> 
				</div>
				@endif
				<div class="header">
					<h2>DATA KARYAWAN</h2>
				</div>
				<div class="body">
					<a href="/karyawan/create" class="btn btn-success btn-sm">Tambah Data</a>
					<br><br>
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
			url: "{{ route('karyawan.index') }}",
			},
			columns: [
				{ data: 'idkar', name: 'idkar' },
				{ data: 'nama', name: 'nama' },
				{ data: 'jabatan', name: 'jabatan' },
				{ data: 'jk', name: 'jk' },
				{ data: 'tl', name: 'tl' },
				{ data: 'nohp', name: 'nohp' },
				{ data: 'alamat', name: 'alamat' },
				{ data: 'no_rek', name: 'no_rek' },
				{ data: 'action', name: 'action', orderable : false, searchable: false}
			]}
			);
		});
</script>	
@endsection