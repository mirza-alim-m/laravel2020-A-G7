@extends('layout.app')
@section('content')

<section class="content">
	<div class="container-fluid">
		<div ng-view="" class="ng-scope">
			<div class="card ng-scope">
				<div class="header">
					<h2>Detail Data Karyawan</h2>
				</div>
				<div class="body">
					@foreach ($daftar as $k)
						<label>Nama</label>
						<label >{{$k->nama}}</label><br>
						<label>Jabatan</label>
						<label >{{$k->jabatan}}</label><br>
						<label>Jenis Kelamin</label>
						<label >{{$k->jk}}</label><br>
						<label>Tanggal Lahir</label>
						<label >{{$k->tl}}</label><br>
						<label>Nomor HP</label>
						<label >{{$k->nohp}}</label><br>
						<label>Alamat</label>
						<label >{{$k->alamat}}</label><br>
						<label>Nomor Rekening</label>
						<label >{{$k->no_rek}}</label><br>
						<label>Gambar: </label>
						<br>
						<img width="25%" src="{{asset('/storage/'.$k->gambar)}}"></center>
						<br>
						<label>PDF: </label>    
						@if($k->pdf)
								<a href="{{ asset('/storage/' . $k->pdf) }}" target="_blank">Download PDF</a>
							@else
								<a>Pdf Not Found</a>
							@endif

						@endforeach
					<br>
					<a href="/karyawan" class="btn btn-primary btn-sm">KEMBALI</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection