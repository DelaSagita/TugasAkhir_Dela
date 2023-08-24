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

						<!-- <a href="{{url('p/permohonan/cuti/create')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> AJUKAN CUTI BARU</a> -->
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
			<a href="{{url('k/permohonan-masuk/cuti')}}" class="btn btn-warning"><i class="fa fa-warning"></i> Permohonan Baru</a>
			<a href="{{url('k/permohonan-masuk/cuti/validasi')}}" class="btn btn-success"><i class="fa fa-check"></i> Permohonan Tervalidasi</a>
			<a href="{{url('k/permohonan-masuk/cuti/tolak')}}" class="btn btn-danger"><i class="fa fa-times"></i> Permohonan Ditolak</a>
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
							<th class="text-white">No</th>
							<th class="text-white">Kategori Cuti</th>
							<th class="text-white">Tgl. Cuti</th>
							<th class="text-white">Pegawai Yang Mengajukan</th>
							<th class="text-white">Aksi Permintaan</th>
							<th class="text-white">Status</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_cuti->sortByDesc('cuti_id') as $c)
						<tr>

							@php
							$tahun_1 = date('Y') - 1;
							$tahun_2 = date('Y') - 2;

							$cek_tahun_1 =  App\Models\CutiDetail::where('tahun_cuti',$tahun_1)
							->where('status_cuti',1)
							->where('pengaturan_cuti_id',1)
							->where('pegawai_id_cuti', $c->cuti_pegawai_id)
							->count();


							$cek_tahun_2 =  App\Models\CutiDetail::where('tahun_cuti',$tahun_2)
							->where('status_cuti',1)
							->where('pengaturan_cuti_id',1)
							->where('pegawai_id_cuti', $c->cuti_pegawai_id)
							->count();

							$cek_tahun_sekarang = App\Models\CutiDetail::where('tahun_cuti',date('Y'))
							->where('status_cuti',1)
							->where('pengaturan_cuti_id',1)
							->where('pegawai_id_cuti', $c->cuti_pegawai_id)
							->count();

							$cek_now = $cek_tahun_sekarang;
							$sisa_now = 12 - $cek_now;

							$cek_1 = $cek_tahun_1;
							$sisa_1 = 0;
							if($cek_1 < 7){
								$sisa_1 = 6;
							}elseif($cek_1 > 6){
								$sisa_1 = 12 - $cek_1;
							}

							$cek_2 = $cek_tahun_2;
							$sisa_2 = 0;
							if($cek_2 < 7){
								$sisa_2 = 6;
							}elseif($cek_2 > 6){
								$sisa_2 = 12 - $cek_2;
							}

							$hasil_sisa_cuti_tahunan = $sisa_now + $sisa_1 + $sisa_2;

							@endphp


							<td>{{$loop->iteration}}</td>
							<td>{{ucwords($c->jeniscuti->nama_cuti)}}</td>
							<td>{{$c->tgl_mulai_cuti}} s/d {{$c->tgl_selesai_cuti}}</td>
							<td>{{ucwords($c->pegawai->pegawai_nama)}}</td>
							<td>
								<!-- Button trigger modal -->
								<button
								type="button"
								class="btn btn-sm btn-outline-primary"
								data-bs-toggle="modal"
								data-bs-target="#backDropModal{{$c->cuti_id}}"
								>Detail Permintaan 
							</button>

							<!-- Modal -->
							<div class="modal fade" id="backDropModal{{$c->cuti_id}}" data-bs-backdrop="static" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content" >
										<div class="modal-header">
											<h5 class="modal-title" id="backDropModalTitle">Detail Permohonan Cuti</h5>
											<button
											type="button"
											class="btn-close"
											data-bs-dismiss="modal"
											aria-label="Close"
											></button>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-6">
													<b>Pegawai Yang Mengajukan Cuti :</b> <br>
													{{ucwords($c->pegawai->pegawai_nama)}} <br> <br>

													<b>Kategori Cuti :</b> <br>
													{{ucwords($c->jeniscuti->nama_cuti)}} <br> <br>

													<b>Sisa Cuti Tahunan:</b> <br>
													{{$hasil_sisa_cuti_tahunan}} Hari <br> <br>

													<b>Alasan Cuti :</b> <br>
													{!!nl2br($c->alasan_cuti)!!} <br> <br>

													<b>Alamat Selama Cuti :</b> <br>
													{!!nl2br($c->alamat_selama_cuti)!!} <br> <br>

													<b>Tanggal Cuti :</b> <br>
													Meminta izin cuti selama 
													<b>{{App\Models\CutiDetail::where('id_cuti',$c->cuti_id)
														->where('status_cuti',1)
														->count()}}</b> dari tanggal
														<b>{{$c->tgl_mulai_cuti}}</b> sampai dengan <b>{{$c->tgl_selesai_cuti}}</b> dan tidak terhitungnya hari Sabtu dan Minggu berserta hari libur lainnya <br> <br>

														@if($c->jenis_cuti_id > 2)
														<b>Dokumen Pendukung :</b> <br>
													<a href="{{url('public')}}/app/file/{{$c->file_pendukung}}" download="" class="btn btn-dark"> Download File</a> <br> <br>
														@endif
														


													</div>
													<div class="col-md-6">
														<center>
															<img src="{{url('public')}}/app/pegawai/{{$c->pegawai->foto}}"  onerror="this.onerror=null;this.src='{{url("public")}}/logo/pn-logo.png';" width="80%" alt="">
														</center>

														
														<div class="row mt-3">

															<div class="col-md-6">

																

																<a class="btn btn-success" data-bs-toggle="collapse" href="#collapseExample{{$c->cuti_id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$c->cuti_id}}">
																	Terima
																</a>






															</div>
															<div class="col-md-6">
																<a class="btn btn-danger" data-bs-toggle="collapse" href="#collapseExampletolak{{$c->cuti_id}}" role="button" aria-expanded="false" aria-controls="collapseExampletolak{{$c->cuti_id}}">
																	Tolak
																</a>
															</div>

															<div class="col-md-12 mt-3">
																<div class="collapse" id="collapseExample{{$c->cuti_id}}">

																	<form action="{{url('k/permohonan-masuk/cuti',$c->cuti_id)}}/terima-kasubag" method="post">
																		@csrf
																		@method("PUT")
																		<input type="text" class="form-control" placeholder="Masukan Nomor Surat" name="nomorsurat" required>

																		<button class="btn btn-success mt-3	">SIMPAN</button>
																	</form>
																</div>
															</div>
														</div>

														<div class="col-md-12 mt-3">
															<div class="collapse" id="collapseExampletolak{{$c->cuti_id}}">

																<form action="{{url('k/permohonan-masuk/cuti',$c->cuti_id)}}/tolak-kasubag" method="post">
																	@csrf
																	@method("PUT")
																	<textarea name="alasan_tolak" placeholder="Alasan penolakan" id="" cols="30" rows="3" class="form-control"></textarea>

																	<button class="btn btn-danger mt-3	">TOLAK</button>
																</form>
															</div>
														</div>
													</div>

												</div>
											</div>

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
						</td>
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
							@endif
						</td>
						<td>
							<div class="btn-group">
								<a href="{{url('/k/permohonan-masuk/cuti',$c->cuti_id)}}/detail" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
								@if($c->cuti_status == 6)
								<a href="{{url('/p/permohonan/cuti',$c->cuti_id)}}/cetak" target="_blank" class="btn btn-dark btn-sm"><i class="fa fa-file"></i></a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>

@endsection