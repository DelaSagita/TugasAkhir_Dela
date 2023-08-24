@extends('template.base')
@section('title')
KALENDER LIBUR
@endsection

@section('content')
<div class="container mt-3 mb-5">

	<div class="col-lg-12 mb-4 order-0">
		<div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-7">
					<div class="card-body">
						<h5 class="card-title text-primary">Kalender Libur</h5>
						<p class="mb-4">
							
						</p>



						<!-- Modal Backdrop -->
						<div class="mt-3">

							<!-- Modal -->
							<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
								<div class="modal-dialog">
									<form class="modal-content" action="{{url('o/kalender-libur/create')}}" method="post">
										@csrf
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
											<div class="row">
												<div class="col mb-3">
													<label for="nameBackdrop" class="form-label">Tanggal Libur</label>
													<input
													type="date"
													id="nameBackdrop"
													name="tgl_libur"
													class="form-control"
													placeholder="Enter Name"
													/>
												</div>
											</div>
											<div class="row g-2">
												<div class="col mb-0">
													<label for="emailBackdrop" class="form-label">Nama Event Libur</label>
													<input
													type="text"
													id="emailBackdrop"
													name="nama_even"
													class="form-control"
													placeholder="Nama Event Libur"
													/>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
												Close
											</button>
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
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



<!-- <div class="card">
	<div class="card-body">
		<div class="row">
			<table class="table table-hover " id="example">
				<thead>
					<tr class="bg-primary">
						<th class="text-white">Tanggal</th>
						<th class="text-white">Hari</th>
						<th class="text-white">Nama Even</th>
						<th class="text-white">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($list_kalender->sortBy('tgl') as $k)

					<tr>
						@if($sekarang >= $k->tgl)
						<td class="bg-danger text-white">{{$k->tgl}}</td>
						@else
						<td class="bg-success text-white">{{$k->tgl}}</td>
						@endif
						<td>{{$k->hari_libur}}</td>
						<td>{{ucwords($k->nama_even)}}</td>
						<td>
							<a href="" class="btn btn-danger btn-sm">Hapus</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div> -->

<div class="row">
	@foreach($list_kalender->sortBy('tgl') as $k)

	<div class="col-md-2 col-6 mb-3">
		<div class="card shadow" style="height:200px">
			@if($sekarang < $k->tgl)
			<div class="card-title pt-3 pb-3 bg-danger text-white" style="border-radius: 10%;">
				@else
				<div class="card-title pt-3 pb-3 bg-success text-white" style="border-radius: 10%;">
					@endif
					<center>
						<b>{{$k->hari_libur}}</b>
					</center>
				</div>
				<div class="card-body" style="color:red; margin-top: -20px;">
					<center>
						<h1 style="color:red">{{$k->tgl_libur}} <br> <p style="font-size:12pt">{{$k->bulan_libur}}-{{$k->tahun_libur}}</p></h1>
						<p style="font-size:7pt">{{ucwords($k->nama_even)}}</p>
					</center>
				</div>
			</div>

		</div>
		@endforeach
	</div>
</div>

@endsection