@extends('template.base')
@section('title')
PERMOHONAN Tidak Masuk
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
						<h5 class="card-title text-primary">DATA PERMOHONAN TIDAK MASUK KERJA ANDA</h5>
						<p class="mb-4">
							Jumlah Tidak Masuk Bulan Ini <span class="fw-bold">{{$count_data}} HARI</span> 
						</p>

						<a href="{{url('p/permohonan/tidak-masuk/create')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> Ajukan Izin Baru</a>
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
						<h3>Data Permohonan Tidak Masuk Kerja</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>
				</div>
				<table class="table table-hover">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">Tgl. Izin</th>
							<th class="text-white">Status Izin</th>
							<th class="text-white">Alasan Izin</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_data as $c)
						<tr>
							<td>{{$c->tgl_mulai_izin}} - {{$c->tgl_selesai_izin}}</td>
							<td>
								@if($c->status_izin == 0)
								<span class="badge bg-warning">Pengajuan Baru</span>
								@elseif($c->status_izin == 1)
								<span class="badge bg-success">Izin Diterima</span>
								@else
								<span class="badge bg-danger">Izin Ditolak</span>
								@endif
							</td>
							<td>{{$c->alasan_izin}}</td>
						<td>
							<div class="btn-group">
								@if($c->status == 2)
								<a href="{{url('p/permohonan/tidak-masuk',$c->td_masuk_id)}}/cetak" target="_blank" class="btn btn-dark btn-sm"><i class="fa fa-file"></i> Download</a>

								<a href="{{url('p/permohonan/tidak-masuk-pegawai',$c->td_masuk_id)}}/cetak" target="_blank" class="btn btn-dark btn-sm"><i class="fa fa-file"></i>Download Pegawai</a>
								@endif
								@if($c->status == 0)
								<a href="{{url('p/permohonan/tidak-masuk',$c->td_masuk_id)}}/delete" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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