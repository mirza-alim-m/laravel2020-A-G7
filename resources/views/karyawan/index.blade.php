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
					<h2>DATA Kategori Gaji</h2>
				</div>
				<div class="body">
				<a href="{{ route('karyawans.create') }}" class="btn btn-md btn-success" style="margin-bottom: 10px">Tambah Data</a>
						<table class="table table-bordered" id="myTable">
							<thead>
								<tr>
									<th scope="col">JABATAN</th>
									<th scope="col">GAJI</th>
									<th scope="col">AksiI</th>
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
			$('#myTable').DataTable(
			{processing: true,
			serverSide: true,
			ajax: {
			url: "{{ route('karyawans.index') }}",
			},
			columns: [
				{ data: 'Jabatan', name: 'Jabatan' },
				{ data: 'Gaji_Karyawan', name: 'Gaji_Karyawan' },
				{ data: 'action', name: 'action', orderable : false, searchable: false}
			]}
			);
		});
</script>	
@endsection