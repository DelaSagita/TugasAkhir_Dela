@extends('template.base')
@section('title')
BUAT PENGAJUAN CUTI
@endsection

@section('content')
<div class="container mt-3 mb-5">

	<div class="col-lg-12 mb-4 order-0">
		<div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-7">
					<div class="card-body">
						<h5 class="card-title text-primary">Form Pengajuan Cuti</h5>
						<p class="mb-4">
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


	
	<div class="card">
		<div class="card-body">
			<form action="{{url('pimpinan/permohonan/cuti/create')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">

					<div class="col-md-6 mt-3">
						<span>Jenis Cuti</span>
						<select required name="jenis_cuti_id" id="" class="form-control">
							<option value="" hidden>-- Pilih Jenis Cuti --</option>
							@foreach($list_jenis_cuti as $c)
							<option value="{{$c->pengaturan_cuti_id}}">{{strtoupper($c->nama_cuti)}}</option>
							@endforeach
						</select>
					</div>

					<div class="col-md-6 mt-3">
						<span>File Pendukung</span>
						<input type="file" class="form-control" name="file">
					</div>

					<div class="col-md-6 mt-3">
						<span>Tanggal Mulai Cuti</span>
						<input type="date" class="form-control" required name="tgl_mulai_cuti">
					</div>

					<div class="col-md-6 mt-3">
						<span>Tanggal Selesai Cuti</span>
						<input type="date" class="form-control" required name="tgl_selesai_cuti">
					</div>

					

					<div class="col-md-6 mt-3">
						<span>Alasan Cuti</span>
						<textarea required name="alasan_cuti" id="" cols="30" rows="3" class="form-control"></textarea>
					</div>

					<div class="col-md-6 mt-3">
						<span>Alamat Selama Menjalankan Cuti</span>
						<textarea required name="alamat_selama_cuti" id="" cols="30" rows="3" class="form-control"></textarea>
					</div>

					<div class="col-md-12 mt-3">
						<span>KASUBAG</span>
						<select required name="kasubag_id" id="" class="form-control">
							<option value="{{$kasubag->pegawai_id}}">{{$kasubag->pegawai_nama}}</option>
							@foreach($plh_kasubag as $plh)
							<option value="{{$plh->pengganti->pegawai_id}}">Plh. {{strtoupper($plh->pengganti->pegawai_nama)}}</option>
							@endforeach

							@foreach($plt_kasubag as $plt)
							<option value="{{$plt->pengganti->pegawai_id}}">Plt. {{strtoupper($plt->pengganti->pegawai_nama)}}</option>
							@endforeach
						</select>
					</div>
					

					


				</div>


				<div class="col-md-12">
						<button class="btn btn-primary float-right mt-3" style="float: right;">SIMPAN</button>
			
				</div>
			</form>
		</div>
	</div>
</div>

@endsection