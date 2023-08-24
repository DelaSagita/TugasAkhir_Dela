@extends('template.base')
@section('title')
PEGAWAI
@endsection

@section('content')
<div class="container mt-3 mb-5">

	<div class="col-lg-12 mb-4 order-0">
		<div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-6">
					<div class="card-body">
						<h4 class="card-title text-primary">Data Pegawai PLT</h4>
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
			<form action="{{url('admin/plt/create')}}" method="post">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<span>Pegawai PLT</span>
						<select name="pegawai_plt" id="" class="form-control" required>
							<option value="" hidden>-- Pilih Pegawai --</option>
							@foreach($list_pimpinan as $p)
							<option value="{{$p->pegawai_id}}">{{ucwords($p->pegawai_nama)}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						<span>Pegawai Pengganti PLT</span>
						<select name="pegawai_pengganti_plt" id="" class="form-control" required>
							<option value="" hidden>-- Pilih Pegawai --</option>
							@foreach($list_pimpinan as $p)
							<option value="{{$p->pegawai_id}}">{{ucwords($p->pegawai_nama)}}</option>
							@endforeach
						</select>
					</div>

					<div class="col-md-6 mt-3">
						<span> Tgl PLT</span>
						<input type="date" class="form-control" name="plt_mulai"required>
					</div>
					<div class="col-md-6 mt-3">
						<span> Tgl PLT Selesai</span>
						<input type="date" class="form-control" name="plt_selesai"required>
					</div>

					<div class="col-md-12">
						<button class="btn btn-primary mt-3 float-right" type="submit">SIMPAN</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection