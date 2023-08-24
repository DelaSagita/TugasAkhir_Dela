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
						<h5 class="card-title text-primary">Form Izin Tidak Masuk Kerja</h5>
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
			<form action="{{url('p/permohonan/tidak-masuk/create')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">

					<div class="col-md-6 mt-3">
						<span>Tanggal Mulai Tidak Masuk Kerja</span>
						<input type="date" class="form-control" required  name="tgl_mulai_izin">
					</div>

					<div class="col-md-6 mt-3">
						<span>Tanggal Selesai Tidak Masuk Kerja</span>
						<input type="date" class="form-control" required  name="tgl_selesai_izin">
					</div>

					<div class="col-md-6 mt-3">
						<span>Alasan Tidak Masuk Kerja</span>
						<textarea name="alasan_izin" id="" cols="30" rows="3" class="form-control"required ></textarea>
					</div>

					<div class="col-md-6 mt-3">
						<span>Validator</span>
						<select name="atasan_id" id="" class="form-control"required >
							<option value="{{$pimpinan->pegawai_id}}">{{strtoupper($pimpinan->pegawai_nama)}}</option>
							@foreach($plh_atasan as $plh)
							<option value="{{$plh->pengganti->pegawai_id}}">Plh. {{strtoupper($plh->pengganti->pegawai_nama)}}</option>
							@endforeach

							@foreach($plt_atasan as $plt)
							<option value="{{$plt->pengganti->pegawai_id}}">Plt. {{strtoupper($plt->pengganti->pegawai_nama)}}</option>
							@endforeach
						</select>
					</div>


				</div>


				<div class="col-md-12">
					<center>
						<button class="btn btn-primary mt-3">SIMPAN</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>



@endsection