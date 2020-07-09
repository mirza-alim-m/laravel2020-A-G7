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
						<form action="{{ route('karyawans.update', $karyawan->Jabatan) }}" method="POST" >
							@csrf
							@method('PUT')
							<div class="form-group">
								<label>JABATAN</label>
								<input type="text" name="jabatan" placeholder="Masukan Jabatan" value="{{ $karyawan->Jabatan }}" class="form-control">
							</div>
							<div class="form-group">
								<label>GAJI</label>
								<input type="text" name="gaji_karyawan" placeholder="Masukan Gaji" value="{{ $karyawan->Gaji_Karyawan }}" class="form-control">
							</div>
							
							<div class="form-group">
								<label>Gambar :</label></br>
								<img width="25%" src="{{asset('/storage/'.$karyawan->gambar)}}"><br><br>
								<input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
								@error('gambar')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label>PDF
									@if($karyawan->pdf)
                                    <a href="{{ asset('/storage/' . $karyawan->pdf) }}" target="_blank">Download PDF</a>
                                @else
                                    <a>Pdf Not Found</a>
                                @endif
									:</label></br>
								<input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror">
								@error('file')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<input type="hidden" name="gambarlama" value="{{ $karyawan->gambar }}">
								<input type="hidden" name="pdflama" value="{{ $karyawan->pdf }}">
							</div>
							<button type="submit" class="btn btn-success">UPDATE</button>
							<button type="reset" class="btn btn-warning">RESET</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </section>

@endsection