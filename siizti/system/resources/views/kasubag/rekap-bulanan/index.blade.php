@extends('template.base')
@section('title')
Rekap Bulanan
@endsection

@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<div class="container mt-3 mb-5">

	<div class="col-lg-12 mb-4 order-0">
		<div class="card">
			<div class="d-flex align-items-end row">
				<div class="col-sm-7">
					<div class="card-body">
						<h5 class="card-title text-primary">DATA PERMOHONAN CUTI BULANAN</h5>
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


	<div class="iq-card-header">
		<div class="iq-header-title d-flex flex-column justify-content-center align-items-center py-3">
			<h3 class="card-title text-uppercase">Rekapan Cuti Bulanan Th. {{$tahun_link}}</h3>
		</div>
	</div>
	<div class="iq-card-body">
		<div class="row mt-3">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-fill alert alert-primary text-dark">
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/01', $tahun_link) }}" class="nav-link @if($bulan_link == '01') active @endif" >JAN</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/02', $tahun_link) }}" class="nav-link @if($bulan_link == '02') active @endif" >FEB</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/03', $tahun_link) }}" class="nav-link @if($bulan_link == '03') active @endif" >MAR</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/04', $tahun_link) }}" class="nav-link @if($bulan_link == '04') active @endif" >APR</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/05', $tahun_link) }}" class="nav-link @if($bulan_link == '05') active @endif" >MEI</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/06', $tahun_link) }}" class="nav-link @if($bulan_link == '06') active @endif" >JUNI</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/07', $tahun_link) }}" class="nav-link @if($bulan_link == '07') active @endif" >JULI</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/08', $tahun_link) }}" class="nav-link @if($bulan_link == '08') active @endif" >AGST</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/09', $tahun_link) }}" class="nav-link @if($bulan_link == '09') active @endif" >SEPT</a>
					</li>

					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/10', $tahun_link) }}" class="nav-link @if($bulan_link == '10') active @endif" >OKT</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/11', $tahun_link) }}" class="nav-link @if($bulan_link == '11') active @endif" >NOV</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('k/rekap-bulanan/12', $tahun_link) }}" class="nav-link @if($bulan_link == '12') active @endif " >DES</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-md-12">

			

			@php
			$tahun_now = date('Y');
			$tahun1 = $tahun_now - 1;
			$tahun2 = $tahun_now - 2;
			@endphp

			<div class="float-right">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle mr-2 float-right mb-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						PERIODE {{ $tahun_link }}
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item custom-item" href="{{ url('k/rekap-bulanan',[$bulan_link,$tahun_now])  }}">PERIODE {{$tahun_now}}</a>
						<a class="dropdown-item custom-item" href="{{ url('k/rekap-bulanan',[$bulan_link,$tahun1]) }}">PERIODE {{$tahun1}}</a>
						<a class="dropdown-item custom-item" href="{{ url('k/rekap-bulanan',[$bulan_link,$tahun2]) }}">PERIODE {{$tahun2}}</a>
					</div>
				</div>
			</div>
		</div>




		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="table-title">

						<a href="{{url('k/rekap-bulanan/cetak',[$bulan_link,$tahun_link])}}" target="_blank" class="btn btn-dark" style="float:right;"><i class="fa fa-print"></i> Cetak</a>
					</div>

					<table class="custom-table table-bordered">

						<thead>
							<tr>
								<h2 class="table-title">Rekapitulasi Izin dan Cuti Pegawai Bulan Juni 2023</h2>
							</tr>
							<tr>
								<td class="text-center" rowspan="2">No.</td>
								<td class="text-center" rowspan="2">Nama</td>
								<td class="text-center" rowspan="2">NIP</td>
								<td class="text-center" rowspan="2">Jabatan</td>
								<td class="text-center" colspan="10">Mengajukan Cuti</td>
								<td class="text-center" rowspan="2">Sisa Cuti Tahunan</td>
							</tr>
							<tr>
								<td class="text-center">ct</td>
								<td class="text-center">cb</td>
								<td class="text-center">cs</td>
								<td class="text-center">cs1</td>
								<td class="text-center">cm</td>
								<td class="text-center">cap</td>
								<td class="text-center">cap1</td>
								<td class="text-center">clt</td>
								<td class="text-center">ik</td>
								<td class="text-center">tmk</td>
							</tr>
						</thead>
						<tbody>
							@foreach($list_pegawai as $p)
							<tr>
								<td class="text-center">{{$loop->iteration}}</td>
								<td class="">{{ucwords($p->pegawai_nama)}}</td>
								<td class="text-center">{{$p->pegawai_nip}}</td>
								<td class="text-center">{{ucwords($p->pegawai_jabatan)}}</td>
								<td class="text-center">
									<!-- CUTI TAHUNAN -->
									@php

									$cb = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
									->where('status_cuti',1)
									->where('pengaturan_cuti_id',1)
									->where('pegawai_id_cuti', $p->pegawai_id)
									->where('tahun_cuti', $tahun_link)
									->whereMonth('tgl_cuti_full', $bulan_link)
									->count();

									@endphp

									{{$cb}}
								</td>
								<td class="text-center">
									<!-- CUTI BESAR -->
									@php

									$ct = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
									->where('status_cuti',2)
									->where('pengaturan_cuti_id',1)
									->where('pegawai_id_cuti', $p->pegawai_id)
									->where('tahun_cuti', $tahun_link)
									->whereMonth('tgl_cuti_full', $bulan_link)
									->count();

									@endphp

									{{$ct}}
								</td>
								<td class="text-center">
									<!-- CUTI SAKIT -->
									@php

									$cs = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
									->where('status_cuti',6)
									->where('pengaturan_cuti_id',1)
									->where('pegawai_id_cuti', $p->pegawai_id)
									->where('tahun_cuti', $tahun_link)
									->whereMonth('tgl_cuti_full', $bulan_link)
									->count();

									@endphp
									@if($cs > 14)
									0
									@else
									{{$cs}}
									@endif
								</td>
								<td class="text-center">
									@php

									$cs1 = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
									->where('status_cuti',6)
									->where('pengaturan_cuti_id',1)
									->where('pegawai_id_cuti', $p->pegawai_id)
									->where('tahun_cuti', $tahun_link)
									->whereMonth('tgl_cuti_full', $bulan_link)
									->count();

									@endphp
									@if($cs1 > 14)
									{{$cs1}}
									@else
									0
									@endif
								</td>
								<td class="text-center">
									@php

									$cm = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
									->where('status_cuti',3)
									->where('pengaturan_cuti_id',1)
									->where('pegawai_id_cuti', $p->pegawai_id)
									->where('tahun_cuti', $tahun_link)
									->whereMonth('tgl_cuti_full', $bulan_link)
									->count();

									@endphp
									{{$cm}}
								</td>
								<td class="text-center">
									<!-- CAP -->
									@php

									$cap = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
									->where('status_cuti',5)
									->where('pengaturan_cuti_id',1)
									->where('pegawai_id_cuti', $p->pegawai_id)
									->where('tahun_cuti', $tahun_link)
									->whereMonth('tgl_cuti_full', $bulan_link)
									->count();

									@endphp
									@if($cap > 10)
									0
									@else
									{{$cap}}
									@endif
								</td>
								<td class="text-center">
									<!-- CAP -->
									@php

									$cap1 = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
									->where('status_cuti',5)
									->where('pengaturan_cuti_id',1)
									->where('pegawai_id_cuti', $p->pegawai_id)
									->where('tahun_cuti', $tahun_link)
									->whereMonth('tgl_cuti_full', $bulan_link)
									->count();

									@endphp
									@if($cap1 > 10)
									{{$cap1}}
									@else
									0
									@endif
								</td>
								<td class="text-center">
									<!-- CLT -->
									@php

									$clt = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
									->where('status_cuti',4)
									->where('pengaturan_cuti_id',1)
									->where('pegawai_id_cuti', $p->pegawai_id)
									->where('tahun_cuti', $tahun_link)
									->whereMonth('tgl_cuti_full', $bulan_link)
									->count();

									@endphp
									{{$clt}}
								</td>
								<td class="text-center">
									@php

									$ik = App\Models\KeluarKantor::where('pegawai_id', $p->pegawai_id)
									->where('status',1)
									->whereYear('tgl_izin', $tahun_link)
									->whereMonth('tgl_izin', $bulan_link)
									->count();

									@endphp
									{{$ik}}
								</td>
								<td class="text-center">
									@php

									$tmk = App\Models\TidakMasuk::where('id_pegawai_izin', $p->pegawai_id)
									->where('status',2)
									->whereYear('tgl_mulai_izin', $tahun_link)
									->whereMonth('tgl_mulai_izin', $bulan_link)
									->count();

									@endphp
									{{$tmk}}

								</td>
								<td class="text-center">
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

									{{$hasil}}
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