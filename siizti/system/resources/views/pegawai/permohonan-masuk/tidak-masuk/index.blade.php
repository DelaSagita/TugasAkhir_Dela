@extends('template.base')
@section('title')
IZIN KELUAR KANTOR 
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@section('content')

<style>
	td{
		vertical-align: top !important;
		font-size: 11pt;
	}
</style>
<div class="container mt-3 mb-5">

	<div class="col-lg-12 mb-4 order-0">
		<div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-7">
					<div class="card-body">
						<h5 class="card-title text-primary">BUAT PERMOHONAN UNTUK TIDAK MASUK KERJA</h5>
						<p class="mb-4">
							Jumlah Pegawai sedang keluar sekarang <span class="fw-bold">10 Org.</span> 
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
						<h3>Data Permhonan Tidak Masuk Kerja</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>
				</div>
				<table class="table table-hover" id="myTable" style="font-size:10pt !important">
					<thead>
						<tr class="bg-primary">
							<th class="text-white" width="25%">Nama Pegawai</th>
							<th class="text-white" width="15%">Tgl. Izin Td. Masuk</th>
							<th class="text-white">Alasan Izin</th>
							<th class="text-white">Status Izin</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_tidakmasuk->sortByDesc('td_masuk_id') as $c)
						<tr>
							<td>{{strtoupper($c->pegawai->pegawai_nama)}}</td>
							<td>
								<center>
									<b style="color:#c70037">{{$c->tgl_mulai_izin}}</b> <br> s/d <br>
									<b style="color:#88f358">{{$c->tgl_selesai_izin}}</b>
								</center>
							</td>
							<td>{{$c->alasan_izin}}</td>
							<td>
								@if($c->status == 0)
								<p class=" btn btn-warning">Menunggu Konfirmasi</p>
								@elseif($c->status == 1)
								<div class="row">
									<p class=" btn btn-danger btn-sm">Izin Ditolak</p>

									<!-- Modal Backdrop -->

									<!-- Button trigger modal -->
									<button
									type="button"
									class="btn btn-secondary btn-sm"
									data-bs-toggle="modal"
									data-bs-target="#backDropModal{{$c->td_masuk_id}}"
									>Lihat Alasan</button>
								</div>
								

								<!-- Modal -->
								<div class="modal fade" id="backDropModal{{$c->td_masuk_id}}" data-bs-backdrop="static" tabindex="-1">
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

								@elseif($c->status == 2)
								<p class=" btn btn-sm btn-success"><i class="fa fa-check"></i> <br> Diterima</p>
								@endif
							</td>
							<td>
								<div class="btn-group">

									<a href="{{url('p/permohonan-masuk/tidak-masuk',$c->td_masuk_id)}}/detail" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
									@if($c->status == 2)
									<a href="{{url('p/permohonan-masuk/tidak-masuk',$c->td_masuk_id)}}/cetak" target="_blank" class="btn btn-dark btn-sm"><i class="fa fa-file"></i> Pimpinan</a>

									<a href="{{url('p/permohonan-masuk/tidak-masuk',$c->td_masuk_id)}}/cetak-pegawai" target="_blank" class="btn btn-dark btn-sm"><i class="fa fa-file"></i> Pegawai</a>
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