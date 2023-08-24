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
						<h5 class="card-title text-primary">Data Pegawai PLH</h5>
						

						<a href="{{url('admin/plh/create')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> Buat PLH</a>
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
		<div class="card-body table-responsive">
			<div class="row">
				<div class="table-title">
					<center>
						<h3>Data Pegawai PLH</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>
				</div>
				<table class="table table-hover table-striped">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">No</th>
							<th class="text-white">Pegawai PLH</th>
							<th class="text-white">Pegawai Pengganti</th>
							<th class="text-white">Tgl. PLH</th>
							<th class="text-white">Jabatan</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_plh->sortByDesc('plh_id') as $p)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ucwords($p->plh->pegawai_nama)}}</td>
							<td>{{ucwords($p->pengganti->pegawai_nama)}}</td>
							<td>{{$p->plh_mulai}} - {{$p->plh_selesai}}</td>
							<td>{{ucwords($p->plh_jabatan)}}</td>
							<td>
								@if($p->status_plh == 1)
								<a href="{{url('admin/plh/selesai',$p->plh_id)}}" onclick="return confirm('yakin melanjutkan aksi?')" class="btn btn-dark">Selesai Plh</a>
								@endif

								@if($p->status_plh == 0)
								<a href="" class="btn btn-secondary"><i class="fa fa-lock"></i> Hapus</a>
								@else
								<a href="{{url('admin/plh/hapus',$p->plh_id)}}" onclick="return confirm('yakin melanjutkan aksi?')" class="btn btn-danger">Hapus</a>
								@endif
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