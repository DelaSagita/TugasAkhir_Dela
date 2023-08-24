@extends('template.base')
@section('title')
PERMOHONAN CUTI
@endsection

@section('content')
<div class="container mt-3 mb-5">

	<div class="col-lg-8 mb-4 order-0">
		<div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-7">
					<div class="card-body">
						<h5 class="card-title text-primary">DATA PERMOHONAN CUTI ANDA</h5>
						<p class="mb-4">
							Jumlah Pegawai Aktif Sekrang <span class="fw-bold">10 HARI</span> 
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


	
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="table-title">
					<center>
						<h3>Data Permhonan Tidak Masuk Kerja</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>
				</div>
				<table class="table table-hover">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">Kategori Cuti</th>
							<th class="text-white">Tgl. Cuti</th>
							<th class="text-white">Pegawai Yang Mengajukan</th>
							<th class="text-white">Aksi Permintaan</th>
							<th class="text-white">Status</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_data as $c)
						<tr>
							<td>{{ucwords($c->jeniscuti->nama_cuti)}}</td>
							<td>{{$c->tgl_mulai_cuti}} s/d {{$c->tgl_selesai_cuti}}</td>
							<td>{{$c->pegawai->pegawai_nama}}</td>
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

													
												</div>
												<div class="col-md-6">
													<center>
														<img src="https://i0.wp.com/www.cirebonkota.go.id/wp-content/uploads/2018/05/jokowi.jpg" width="100%" alt="">
													</center>

													<div class="row mt-3">
														<div class="col-md-6">
															<a href="" class="btn btn-success btn-block"> TERIMA</a>
														</div>
														<div class="col-md-6">
															<a href="" class="btn btn-danger btn-block"> TOLAK</a>
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
							<span class="badge bg-warning">Menunggu Konfirmasi</span>
							@elseif($c->cuti_status == 1)
							<span class="badge bg-warning">Menunggu Konfirmasi KABID</span>
							@elseif($c->cuti_status == 2)
							<span class="badge bg-warning">Menunggu Konfirmasi HAKIM</span>
							@elseif($c->cuti_status == 3)
							<span class="badge bg-success">Pengajuan Diterima</span>
							@endif
						</td>
						<td>
							<div class="btn-group">
								<a href="" class="btn btn-dark btn-sm"><i class="fa fa-file"></i></a>
								<a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

@endsection