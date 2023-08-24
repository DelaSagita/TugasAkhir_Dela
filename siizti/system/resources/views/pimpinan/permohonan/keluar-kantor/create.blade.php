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
						<h5 class="card-title text-primary">Buat Izin Keluar Kantor</h5>
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
			<form action="{{url('pimpinan/permohonan/keluar-kantor/create')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">

					<div class="col-mad-12">
						<span>Alasan Keluar Kantor</span>
						<textarea name="alasan" id="" cols="30" rows="5" class="form-control" placeholder="Deskripsikan alasan keluar kantor"></textarea>
					</div>

					<div class="col-md-6 mt-3">
						<span>Tanggal Izin Keluar Kantor</span>
						<input type="date" class="form-control" name="tgl_izin">
					</div>

					<div class="col-md-6 mt-3">
						<span>Jam Izin Keluar</span>
						<input type="time" class="form-control" name="jam_mulai">
					</div>

					<div class="col-md-6 mt-3">
						<span>Sampai Jam</span>
						<input type="time" class="form-control" name="jam_selesai">
					</div>

					
					<div class="col-md-6 mt-3">
						<span>Validator</span>
						<select name="atasan_id" id="" class="form-control">
							<option value="{{$atasan->pegawai_id}}">{{strtoupper($atasan->pegawai_nama)}}</option>
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