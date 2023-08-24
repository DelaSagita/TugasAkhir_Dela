@extends('template.base')
@section('title')
Rekap Tahunan
@endsection

@section('content')
<div class="container mt-3 mb-5">

	<div class="col-lg-12 mb-4 order-0">
		<div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-7">
					<div class="card-body">
						<h5 class="card-title text-primary">DATA PERMOHONAN CUTI TAHUNAN</h5>
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
			<div class="row">
				<div class="table-title">
					<center>
						<h3>Data Sisa Cuti Tahunan Pegawai</h3>
						<h4>Pengadilan Negeri Ketapang</h4>
					</center>

					<a href="{{url('k/rekap-tahunan/cetak')}}" target="_blank" class="btn btn-dark" style="float:right;"><i class="fa fa-print"></i> Cetak</a>
				</div>

				<table class="table table-hover">
					<thead>
						<tr class="bg-primary">
							<th class="text-white">No</th>
							<th class="text-white">Nama</th>
							<th class="text-white">NIP</th>
							<th class="text-white">Jabatan</th>
							<th class="text-white">Sisa Cuti Tahunan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_pegawai as $p)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ucwords($p->pegawai_nama)}}</td>
							<td>{{$p->pegawai_nip}}</td>
							<td>{{ucwords($p->pegawai_jabatan)}}</td>
							<td>
								@php
 $tahun_1 = date('Y') - 1;
    $tahun_2 = date('Y') - 2;

    $cek_tahun_1 =  App\Models\CutiDetail::where('tahun_cuti',$tahun_1)
    ->where('status_cuti',1)
    ->where('pengaturan_cuti_id',1)
    ->where('pegawai_id_cuti', $p->pegawai_id)
    ->count();

    
    $cek_tahun_2 =  App\Models\CutiDetail::where('tahun_cuti',$tahun_2)
    ->where('status_cuti',1)
    ->where('pengaturan_cuti_id',1)
    ->where('pegawai_id_cuti', $p->pegawai_id)
    ->count();

    $cek_tahun_sekarang = App\Models\CutiDetail::where('tahun_cuti',date('Y'))
    ->where('status_cuti',1)
    ->where('pengaturan_cuti_id',1)
    ->where('pegawai_id_cuti', $p->pegawai_id)
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

    $hasil = $sisa_now + $sisa_1 + $sisa_2;
								@endphp

								{{$hasil}} Hari
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