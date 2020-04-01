@extends('layout.app')
@section('content')

	<div class="container" style="margin-top: 80px">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card">
					<div class="card-header">
						<strong>Edit Daftar Gaji</strong>
					</div>
					<div class="card-body">
						<form action="{{ route('karyawans.update', $karyawan->Jabatan) }}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label>JABATAN</label>
								<input type="text" name="jabatan" placeholder="Masukan Jabatan" value="{{ $karyawan->Jabatan }}" class="form-control">
							</div>
							<div class="form-group">
								<label>GAJI</label>
								<input type="text" name="gaji_karyawan" placeholder="Masukan Gaji" value="{{ $karyawan->Gaji_Karyawan }}" class="form-control">
							<button type="submit" class="btn btn-success">UPDATE</button>
							<button type="reset" class="btn btn-warning">RESET</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'content' );
	</script>
</body>
</html>

@endsection