@extends('layout.app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div ng-view="" class="ng-scope">
			<div class="card ng-scope">
				<div class="header">
					<h2>Ubah Daftar Gaji</h2>
				</div>
				<div class="body">
					@foreach ($daftar as $daftar)
					<form action="/penggajian/{{$daftar->id_gaji}}" method="POST"enctype="multipart/form-data">
						{{ csrf_field() }}
						@method('PUT')
						<div class="form-group">
							<label>Nama Pegawai</label>
							<select name="nama">
								<option value="">Pilih karyawan</option>
								@foreach ($karyawan as $k)
								@if ($k->idkar==$daftar->idkar)
								<option value="{{$k->idkar}}" selected> {{$k->nama}}</option>
								@else
								<option value="{{$k->idkar}}"> {{$k->nama}}</option>
								@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Bagian Kerja </label>
							<select name="utama" id="">
								<option value="">Pilih Bagaian Kerja</option>
								@foreach ($utama as $k)
								@if ($k->id_jenis == $daftar->id_jenis)
								<option value="{{$k->id_jenis}}" selected> {{$k->Jabatan}} | {{$k->Gaji_Karyawan}}</option>
								@else
								<option value="{{$k->id_jenis}}"> {{$k->Jabatan}} | {{$k->Gaji_Karyawan}}</option>
								@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Jam Lembur </label>
						<input type="text" name="lembur" required placeholder="masukan jam lembur..." value="{{$daftar->jam_lembur}}">
						</div>
						<div class="form-group">
							<label>Total Gaji </label>
							<input type="text" name="total" required placeholder="masukan total gaji..." value="{{$daftar->total}}">
						</div>
						<div class="form-group">
							<label>Tanggal </label>
							<input type="text" name="tanggal" required placeholder="masukan tanggal (TTTT-BB-HH)" value="{{$daftar->tanggal}}">
						</div>
						<div class="form-group">
							<label>Gambar :</label></br>
							<img width="25%" src="{{asset('/storage/'.$daftar->gambar)}}"><br><br>
							<input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
							@error('gambar')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group">
							<label>PDF
								@if($daftar->pdf)
								<a href="{{ asset('/storage/' . $daftar->pdf) }}" target="_blank">Download PDF</a>
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
							<input type="hidden" name="gambarlama" value="{{ $daftar->gambar }}">
							<input type="hidden" name="pdflama" value="{{ $daftar->pdf }}">
						</div>

						<button type="submit" class="btn btn-success">SAVE</button>
						<button type="reset" class="btn btn-warning">RESET</button>
					</form>
					@endforeach
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection