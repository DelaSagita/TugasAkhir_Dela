@extends('template.base')
@section('title')
PERMOHONAN CUTI
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
						<h5 class="card-title text-primary">DATA PERMOHONAN CUTI</h5>
						<p class="mb-4">
							Jumlah Pegawai sedang cuti sekarang <span class="fw-bold">{{$cuti}} Org.</span> 
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
							<p style="float:right;">{{$permintaan_baru}} Org</p>
						</h3>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card bg-primary">
					<div class="card-body">
						<h3 style="color:#ffffff"><b>Hari Ini</b> <br>
							<p style="float:right;">{{$hari_ini}} Org</p>
						</h3>
					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="card bg-primary">
					<div class="card-body">
						<h3 style="color:#ffffff"><b>Bulan Ini</b> <br>
							<p style="float:right;">{{$bulan_ini}} Org</p>
						</h3>
					</div>
				</div>
			</div>

		</div>
	</div>


	<div class="card mb-3">
		<div class="card-body">
			<a href="{{url('pimpinan/permohonan-masuk/cuti')}}" class="btn btn-warning"><i class="fa fa-warning"></i> Permohonan Baru</a>
			<a href="{{url('pimpinan/permohonan-masuk/cuti/validasi')}}" class="btn btn-success"><i class="fa fa-check"></i> Permohonan Tervalidasi</a>
			<a href="{{url('pimpinan/permohonan-masuk/cuti/tolak')}}" class="btn btn-danger"><i class="fa fa-times"></i> Permohonan Ditolak</a>
		</div>
	</div>

	
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="table-title">
					<center>
						<h3>Data Permhonan Cuti</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>
				</div>
				<table class="table table-hover">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">Kategori Cuti</th>
							<th class="text-white">Tgl. Cuti</th>
							<th class="text-white">Alasan Cuti</th>
							<th class="text-white">Pegawai Yang Mengajukan</th>
							<th class="text-white">Status</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_cuti as $c)
						<tr>
							<td>{{ucwords($c->jeniscuti->nama_cuti)}}</td>
							<td>{{$c->tgl_mulai_cuti}} s/d {{$c->tgl_selesai_cuti}}</td>
							<td>{{ucwords($c->alasan_cuti)}}</td>
							<td>{{$c->pegawai->pegawai_nama}}</td>
							<td>
								@if($c->cuti_status == 0)
								<span class="badge bg-warning">Permohonan Baru</span>
								@elseif($c->cuti_status == 1)
								<span class="badge bg-danger">Ditolak Kasubag</span>
								@elseif($c->cuti_status == 2)
								<span class="badge bg-success"> 1/3 Diterima Kasubag</span>
								@elseif($c->cuti_status == 3)
								<span class="badge bg-danger">Ditolak Kepala Bidang</span>
								@elseif($c->cuti_status == 4)
								<span class="badge bg-success">Diterima Kepala Bidang</span>
								@elseif($c->cuti_status == 5)
								<span class="badge bg-danger">Ditolak Pimpinan</span>
								@elseif($c->cuti_status == 6)
								<span class="badge bg-success">Diterima Pimpinan</span>
								@elseif($c->cuti_status == 7)
								<span class="badge bg-success">Ditangguhkan</span>
								@elseif($c->cuti_status == 8)
								<span class="badge bg-success">Perubahan</span>
								@endif
							</td>
							<td>
								<div class="btn-group">
									<a href="{{url('/pimpinan/permohonan-masuk/cuti',$c->cuti_id)}}/detail" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
									<a href="{{url('/pimpinan/permohonan/cuti',$c->cuti_id)}}/cetak" class="btn btn-dark btn-sm"><i class="fa fa-file"></i></a>
								</div>
							</td>
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