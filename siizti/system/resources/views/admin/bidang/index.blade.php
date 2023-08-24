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
							<h5 class="card-title text-primary">Data Bidang Pengadilan Negeri Ketapang</h5>
							<p class="mb-4">
							</p>

							<button
							type="button"
							class="btn btn-sm btn-outline-primary"
							data-bs-toggle="modal"
							data-bs-target="#backDropModal"
							>Buat Bidang
						</button>

						<!-- Modal -->
						<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content" >
									<div class="modal-header">
										<h5 class="modal-title" id="backDropModalTitle">Data Bidang</h5>
										<button
										type="button"
										class="btn-close"
										data-bs-dismiss="modal"
										aria-label="Close"
										></button>
									</div>
									<div class="modal-body">
										
										<form action="{{url('admin/bidang/create')}}" method="post">
											@csrf
											<div class="row">
												<div class="col-md-12">
													<label for="">Nama Bidang</label>
													<input type="text" name="bidang_nama" required class="form-control">
												</div>
												<div class="col-md-12">
													<label for="">Pimpinan Bidang</label>
													<select name="bidang_pimpinan_id" id="" class="form-control" required>
														<option value="" hidden>-- Pilih Pimpinan --</option>
														@foreach($list_pegawai as $p)
														<option value="{{$p->pegawai_id}}">{{ucwords($p->pegawai_nama)}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<button class="btn btn-primary mt-3">Buat Bidang</button>
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
				<table class="table table-hover table-striped" id="example">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">Nama Bidang</th>
							<th class="text-white">Pimpinan</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_bidang as $b)
						<tr>
							<td>{{ucwords($b->bidang_nama)}}</td>
							<td>
								@if($b->pimpinan->pegawai_level == 0)
								<span class="bg-danger text-white btn btn-sm"><i class="fa fa-warning"></i> Belum memilih pimpinan</span>
								@else
								{{ucwords($b->pimpinan->pegawai_nama)}}
								@endif
							</td>
							<td>
								<div class="btn-group">	
									<div class="mt-3">
										<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#backDropModal{{$b->bidang_id}}">Edit </button>
										<a href="{{url('admin/bidang',$b->bidang_id)}}/hapus" onclick="return confirm('Yakin menghapus bidang ini?')" class="btn btn-danger">Hapus</a>

										<!-- Modal -->
										<div class="modal fade" id="backDropModal{{$b->bidang_id}}" data-bs-backdrop="static" tabindex="-1">
											<div class="modal-dialog">
												<form class="modal-content" action="{{url('admin/bidang',$b->bidang_id)}}/edit" method="post">
													@csrf
													@method("PUT")
													<div class="modal-header">
														<h5 class="modal-title" id="backDropModalTitle">Bidang/Sub Bagian</h5>
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
																<label for="nameBackdrop" class="form-label">Nama Bidang/Sub Bagian</label>
																<input type="text" name="bidang_nama" class="form-control" value="{{strtoupper($b->bidang_nama)}}" placeholder="Enter Name"/>
															</div>
														</div>

														<div class="col mb-3">
															<div class="form-group">
																<label for="" class="label">Pimpinan Bidang</label>
																<select name="bidang_pimpinan_id" id="" class="form-control">
																	<option value="{{$b->pimpinan->pegawai_id}}" hidden >{{ucwords($b->pimpinan->pegawai_nama)}}</option>
																	@foreach($list_pegawai as $p)
																	<option value="{{$p->pegawai_id}}">{{ucwords($p->pegawai_nama)}}</option>
																	@endforeach
																</select>
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