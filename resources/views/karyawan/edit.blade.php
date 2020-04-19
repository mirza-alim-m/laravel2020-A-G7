@extends('layout.app')
@section('content')
<section class="content">
        <div class="container-fluid">
            <div ng-view="" class="ng-scope">
                <div class="card ng-scope">
                    <div class="header">
                        <h2>Edit Kategori Gaji</h2>
                    </div>
                    <div class="body">
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
    </section>

@endsection