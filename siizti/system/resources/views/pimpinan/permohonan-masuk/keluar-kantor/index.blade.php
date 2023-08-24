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
						<h5 class="card-title text-primary">BUAT PERMOHONAN UNTUK KELUAR KANTOR</h5>
						<p class="mb-4">
							Jumlah Pegawai sedang keluar sekarang <span class="fw-bold">{{$keluarkantor}} Org.</span> 
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


	
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="table-title">
					<center>
						<h3>Data Permhonan Izin Keluar Kantor</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>
				</div>
				<table class="table table-hover" id="myTable">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">No</th>
							<th class="text-white">Nama Pegawai</th>
							<th class="text-white">Tgl. Izin</th>
							<th class="text-white">Waktu Izin</th>
							<th class="text-white">Alasan Izin</th>
							<th class="text-white">Status Izin</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_data->sortByDesc('keluar_kantor_id') as $c)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$c->pegawai->pegawai_nama}}</td>
							<td>{{$c->tgl_izin}}</td>
							<td>{{$c->jam_mulai}} s/d {{$c->jam_selesai}}</td>
							<td>{{$c->alasan}}</td>
							<td>
								@if($c->status == 0)
								<p class=" btn btn-warning">Menunggu Konfirmasi</p>
								@elseif($c->status == 1)
								<p class=" btn btn-success">Izin Keluar Disetujui</p>
								@elseif($c->status == 2)
								<div class="row">
									<p class=" btn btn-danger">Izin Ditolak</p>
									<button
									type="button"
									class="btn btn-secondary"
									data-bs-toggle="modal"
									data-bs-target="#backDropModal{{$c->keluar_kantor_id}}"
									>Lihat Alasan</button>
								</div>
								

								<!-- Modal -->
								<div class="modal fade" id="backDropModal{{$c->keluar_kantor_id}}" data-bs-backdrop="static" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content" >
											@csrf
											<div class="modal-header">
												<h5 class="modal-title" id="backDropModalTitle">Alasan Penolakan</h5>
												<button
												type="button"
												class="btn-close"
												data-bs-dismiss="modal"
												aria-label="Close"
												></button>
											</div>
											<div class="modal-body">
												{{$c->alasan_tolak}}
											</div>
										</div>
									</div>
								</div>
								@endif
							</td>
							<td>
								<div class="btn-group">

									@if($c->status == 0)
									<a href="{{url('pimpinan/permohonan-masuk/keluar-kantor',$c->keluar_kantor_id)}}/detail" class="btn btn-warning"><i class="fa fa-eye"></i></a>
									@elseif($c->status == 1)
									<a href="{{url('kb/permohonan-masuk/keluar-kantor',$c->keluar_kantor_id)}}/detail" class="btn btn-warning"><i class="fa fa-eye"></i></a>
									<a href="{{url('kb/permohonan/keluar-kantor',$c->keluar_kantor_id)}}/cetak" target="_blank" class="btn btn-dark"><i class="fa fa-file"></i></a>
									@elseif($c->status == 2)
									<a href="{{url('kb/permohonan-masuk/keluar-kantor',$c->keluar_kantor_id)}}/detail" class="btn btn-warning"><i class="fa fa-eye"></i></a>
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