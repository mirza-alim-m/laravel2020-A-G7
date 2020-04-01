@extends('layout.app')
@section('content')
	<!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    
	<!-- <title>Tambah Data</title> -->

	
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
						<strong>Tambah Data Mahasiswa</strong>
					</div>
					<div class="card-body">
						<form action="{{ route('mahasiswas.store') }}" method="POST">
							@csrf
							<div class="form-group">
								<label>NIM</label>
								<input type="text" name="nim" placeholder="Masukan Nim" class="form-control" required>
							</div>
							<div class="form-group">
								<label>NAMA</label>
								<input type="text" name="nama" placeholder="Masukan Nama" class="form-control" required>
							</div>
							<div class="form-group">
								<label>KELAS</label>
								<input type="text" name="kelas" placeholder="Masukan Kelas" class="form-control" required>
							</div>
							<div class="form-group">
								<label>ALAMAT</label>
								<textarea class="form-control" name="alamat" placeholder="Masukan Alamat" rows="2" required></textarea>
								<!-- <input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control"> -->
							</div>
							<button type="submit" class="btn btn-success">SAVE</button>
							<button type="reset" class="btn btn-warning">RESET</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<!-- <script>
		CKEDITOR.replace( 'content' );
	</script> -->
@endsection