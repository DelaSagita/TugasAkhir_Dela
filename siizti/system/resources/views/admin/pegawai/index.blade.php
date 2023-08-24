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
							<h5 class="card-title text-primary">Data Pegawai Pengadilan Negeri</h5>
							<p class="mb-4">
							</p>

							<a href="{{url('admin/pegawai/create')}}" class="btn btn-sm btn-outline-primary">Tambah Pegawai</a>
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
						<h3>Data Pegawai Aktif</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>
				</div>
				<table class="table table-hover table-striped">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">NIP Pegawai</th>
							<th class="text-white">Nama</th>
							<th class="text-white">Bidang</th>
							<th class="text-white">Jabatan</th>
							<th class="text-white">Golongan</th>
							<th class="text-white">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_pegawai as $p)
						<tr>
							<td>{{$p->pegawai_nip}}</td>
							<td><a href="{{url('admin/pegawai',$p->pegawai_id)}}/detail">{{ucwords($p->pegawai_nama)}}</a></td>
							<td>{{$p->bidang->bidang_nama}}</td>
							<td>{{ucwords($p->pegawai_jabatan)}}</td>
							<td>{{strtoupper($p->pegawai_golongan)}}</td>
							<td>
								<div class="btn-group">
									<a href="{{url('admin/pegawai',$p->pegawai_id)}}/detail" class="btn btn-dark btn-sm">Lihat</a>
									<a href="{{url('admin/pegawai',$p->pegawai_id)}}/edit" class="btn btn-warning btn-sm">Edit</a>
									<a href="{{url('admin/pegawai',$p->pegawai_id)}}/hapus" onclick="return confirm('Yakin menghapus pegawai ini?')" class="btn btn-danger btn-sm">Hapus</a>
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