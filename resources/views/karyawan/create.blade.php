@extends('layout.app')
@section('content')
	<!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    
	<!-- <title>Tambah Data</title> -->
	<section class="content">
        <div class="container-fluid">
            <div ng-view="" class="ng-scope">
                <div class="card ng-scope">
                    <div class="header">
                        <h2>Tambah Kategori Gaji</h2>
                    </div>
                    <div class="body">
						<form action="{{ route('karyawans.store') }}" method="POST">
							@csrf
							<div class="form-group">
								<label>JABATAN</label>
								<input type="text" name="jabatan" placeholder="Masukan Jabatan" class="form-control" required>
							</div>
							<div class="form-group">
								<label>GAJI KARYAWAN</label>
								<input type="text" name="gaji" placeholder="Masukan Gaji" class="form-control" required>
							</div>
							<button type="submit" class="btn btn-success">SAVE</button>
							<button type="reset" class="btn btn-warning">RESET</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </section>

@endsection