@extends('layout.app')
@section('content')
<section class="content">
        <div class="container-fluid">
            <div ng-view="" class="ng-scope">
                <div class="card ng-scope">
                    <div class="header">
                        <h2>Detail Kategori Gaji</h2>
                    </div>
                    <div class="body">
							<div class="form-group">
								<label>JABATAN</label>
								<label >{{ $karyawan->Jabatan }}</label>
							</div>
							<div class="form-group">
								<label>GAJI</label>
								<label >{{ $karyawan->Gaji_Karyawan }}</label>
                            </div>
							<a href="/karyawans" class="btn btn-primary btn-sm">KEMBALI</a>
					</div>
                </div>
            </div>
        </div>
    </section>

@endsection