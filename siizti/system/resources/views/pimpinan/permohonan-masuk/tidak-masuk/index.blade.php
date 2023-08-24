@extends('template.base')
@section('title')
IZIN KELUAR KANTOR 
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@section('content')
<div class="container mt-3 mb-5">

	<div class="col-lg-12 mb-4 order-0">
		<div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-7">
					<div class="card-body">
						<h5 class="card-title text-primary">BUAT PERMOHONAN UNTUK TIDAK MASUK KERJA</h5>
						<p class="mb-4">
							Jumlah Pegawai sedang keluar sekarang <span class="fw-bold">{{$tidakmasuk}} Org.</span> 
						</p>

					</div>
				</div>
				<div class="col-sm-5 text-center text-sm-left">
					<div class="card-body pb-0 px-0 px-md-4">
						<img
						src="{{url('public')}}/admin/assets/img/illustrations/man-with-laptop-light.png"
						height="140"
						alt="View Badge User"
						data-app-dark-img="illustrations/man-with-laptop-dark.png"
						data-app-light-img="illustrations/man-with-laptop-light.png"
						/>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12 mb-4 order-0">
		<div class="d-flex align-items-end row">

			<div class="col-md-4">
				<div class="card bg-primary">
					<div class="card-body">
						<h3 style="color:#ffffff"><b>Permintaan Baru</b> <br>
							<p style="float:right;"> Org</p>
						</h3>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card bg-primary">
					<div class="card-body">
						<h3 style="color:#ffffff"><b>Hari Ini</b> <br>
							<p style="float:right;"> Org</p>
						</h3>
					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="card bg-primary">
					<div class="card-body">
						<h3 style="color:#ffffff"><b>Bulan Ini</b> <br>
							<p style="float:right;"> Org</p>
						</h3>
					</div>
				</div>
			</div>

		</div>
	</div>


	
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="table-title">
					<center>
						<h3>Data Permohonan Izin Tidak Masuk Kerja</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>
				</div>
				<table class="table table-hover" id="myTable">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">No</th>
							<th class="text-white">Nama Pegawai</th>
							<th class="text-white">Tgl. Izin</th>
							<th class="text-white">Alasan Izin</th>
							<th class="text-white">Status Izin</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
					@foreach($list_tidakmasuk as $t)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{ucwords($t->pegawai->pegawai_nama)}}</td>
						<td>{{$t->tgl_mulai_izin}} s/d {{$t->tgl_selesai_izin}} </td>
						<td>{{$t->alasan_izin}}</td>
						<td> status </td>
						<td><a href="{{url('pimpinan/permohonan-masuk/tidak-masuk',$t->td_masuk_id)}}/detail" class="btn btn-dark">Lihat</a></td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>

@endsection