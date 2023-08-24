@extends('template.base')
@section('title')
PEGAWAI
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@section('content')
<div class="container mt-3 mb-5">
	<div class="row">

		<div class="col-lg-12 mb-4 order-0">
			<div class="card">
				<div class="d-flex align-items-end row">
					<div class="col-sm-7">
						<div class="card-body">
							<h5 class="card-title text-primary">Data Kalender Libur {{date('Y')}}</h5>
							<p class="mb-4">
								Jumlah Libur tahun {{date('Y')}} sebanyak <span class="fw-bold">{{$jumlah_libur}}</span>
							</p>

							<button
							type="button"
							class="btn btn-sm btn-outline-primary"
							data-bs-toggle="modal"
							data-bs-target="#backDropModal"
							>Buat Kalender
						</button>

						<!-- Modal -->
						<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content" >
									<div class="modal-header">
										<h5 class="modal-title" id="backDropModalTitle">Kalender Libur</h5>
										<button
										type="button"
										class="btn-close"
										data-bs-dismiss="modal"
										aria-label="Close"
										></button>
									</div>
									<div class="modal-body">
										
										<form action="{{url('admin/kalender-libur/create')}}" method="post">
											@csrf
											<div class="row">
												<div class="col-md-6">
													<label for="">Nama Event</label>
													<input type="text" name="nama_even" required class="form-control">
												</div>
												<div class="col-md-6">
													<label for="">Tgl Event</label>
													<input type="date" name="tgl_libur" required class="form-control">
												</div>
											</div>
											<button class="btn btn-primary mt-3">Buat Kalender</button>
										</form>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
											Tutup
										</button>
									</div>
								</div>
							</div>
						</div>
						<!-- end mdal -->

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
</div>


<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="table-title">
				<center>
					<h3>Data Kalender Libur {{date('Y')}}</h3>
					<h4>Pengadilan Negeri Ketapang</h4>
				</center>
			</div>
			<table class="table table-hover ">
				<thead>
					<tr class="bg-primary">
						<th class="text-white">Nama Event</th>
						<th class="text-white">Tanggal</th>
						<th class="text-white">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($list_kalender->sortBy('tgl') as $k)
					<tr class="@if($sekarang < $k->tgl) bg-success text-white @endif">
						<td>{{ucwords($k->nama_even)}}</td>
						<td>{{$k->hari_libur}}, {{$k->tgl_libur}}/{{$k->bulan_libur}}/{{$k->tahun_libur}}</td>
						<td>
							<a href="{{url('admin/kalender-libur',$k->kalender_id)}}/hapus" onclick="return confirm('yakin untuk menghapus?')" class="btn btn-danger btn-sm">Hapus</a>
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