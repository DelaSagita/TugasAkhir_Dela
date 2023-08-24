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
						<h5 class="card-title text-primary">DATA PERMOHONAN CUTI ANDA</h5>
						<p class="mb-4">
						</p>

						<a href="{{url('kb/permohonan/cuti/create')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> AJUKAN CUTI BARU</a>
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


	
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="table-title">
					<center>
						<h3>Data Permohonan Cuti</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>
				</div>
				<table class="table table-hover">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">Kategori Cuti</th>
							<th class="text-white">Tgl. Cuti</th>
							<th class="text-white">Alasan Cuti</th>
							<th class="text-white">Alamat Selama Cuti</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_cuti as $c)
						<tr>
							<td>{{ucwords($c->jeniscuti->nama_cuti)}}</td>
							<td>{{$c->tgl_mulai_cuti}} s/d {{$c->tgl_selesai_cuti}}</td>
							<td>{{ucwords($c->alasan_cuti)}}</td>
							<td>{{ucwords($c->alamat_selama_cuti)}}</td>
							<td>
								<div class="btn-group">
									<a href="{{url('/kb/permohonan/cuti',$c->cuti_id)}}/show" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Lihat</a>

									<a href="{{url('/kb/permohonan/cuti',$c->cuti_id)}}/cetak" target="_blank" class="btn btn-dark btn-sm"><i class="fa fa-file"></i> Cetak</a>
									@if($c->cuti_status == 0)
									<a href="{{url('/kb/permohonan/cuti',$c->cuti_id)}}/hapus" class="btn btn-danger btn-sm">Hapus</a>
									@endif
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