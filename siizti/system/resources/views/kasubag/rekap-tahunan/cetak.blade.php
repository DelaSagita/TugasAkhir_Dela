<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rekap Tahun {{date('Y')}}</title>
	<link rel="icon" type="image/x-icon" href="{{url('public')}}/admin/assets/img/favicon/favicon.ico" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
	href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
	rel="stylesheet"
	/>

	<!-- Icons. Uncomment required icon fonts -->
	<link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/fonts/boxicons.css" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="{{url('public')}}/admin/assets/css/demo.css" />

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

	<link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/libs/apex-charts/apex-charts.css" />
	<script src="{{url('public')}}/admin/assets/vendor/js/helpers.js"></script>

	<link rel="stylesheet" href="{{url('public')}}/font-awesome/css/font-awesome.min.css">

	<script src="{{url('public')}}/admin/assets/js/config.js"></script>
</head>

<style>
	td{
		vertical-align: top !important;
		font-size: 9pt;
	}
</style>
<body>

	<div class="container">
		<div class="row">
			<!-- kop surat -->
			<div class="col-md-12">
				<table>
					<tr>
						<td width="15%">
							<center>
								<img src="{{url('public/logo/pn-logo.png')}}" width="100%" class="float-right" alt="">
							</center>
						</td>
						<td>
							<center>
								<b style="font-size:14pt;">PENGADILAN NEGERI KETAPANG KELAS II</b><br>
								JL. JENDRAL SUDIRMAN NO.19  TELP : (0534) 32805 FAX : (0534) 32805 <br>
								website : www.pn-ketapang.go.id email : info@pn-ketapang.go.id <br>
								KETAPANG - KALIMANTAN BARAT
							</center>
						</td>
					</tr>
				</table>
			</div>
			<!-- end kop surat -->

			<hr style="border: 1px solid black;" class="mt-2">
			 <center>
			 	<h3>REKAP SISA CUTI PEGAWAI TAHUN {{date('Y')}}</h3>
			 </center>

			<div class="col-md-12">
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

	<script>
		setTimeout(function () { window.print(); }, 500);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
	</script>


</body>
</html>







