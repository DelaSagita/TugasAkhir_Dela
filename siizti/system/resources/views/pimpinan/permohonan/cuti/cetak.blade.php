<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{strtoupper($detail->pegawai->pegawai_nama)}} - CUTI - {{$detail->tgl_mulai_cuti}}</title>
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
		font-size: 9pt !important;
	}
</style>
<body>

	<div class="container">
		<div class="col-md-12">
			<table width="100%">
				<tr>
					<td width="30%"> LAMPIRAN II</td>
					<td width="50%">
						<center>
							SURAT EDARAN SEKRETARIS MAHKAMAH AGUNG <br>
							REPUBLIK INDONESIA <br>
							NOMOR 13 TAHUN 2019
						</center>
					</td>
					<td width="20%"></td>
				</tr>

				
			</table>

			<table>
				<tr>
					<td colspan="2" width="55%"></td>
					<td width="45%">
						Ketapang, 15 Mei 2023 <br>
						Yth. Bapak Ketua Pengadilan Negeri Ketapang <br>
						&nbsp;&nbsp;&nbsp;&nbsp;di <br>
						&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;KETAPANG
					</td>
				</tr>
			</table>
		</div>
		<div class="row">
			<center>
				<b>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</b><br>
				Nomor : {{$detail->no_surat}}
			</center>
			<!-- DATA DIRI -->
			<div class="col-md-12 mt-3">
				<table class="table-bordered" width="100%">
					<tr>
						<td colspan="4"><b> I. DATA PEGAWAI</b></td>
					</tr>
					<tr>
						<td width="25%"> NAMA</td>
						<td width="25%"> {{strtoupper($detail->pegawai->pegawai_nama)}}</td>
						<td width="25%"> NIP</td>
						<td width="25%"> {{$detail->pegawai->pegawai_nip}}</td>
					</tr>

					<tr>
						<td width="25%"> JABATAN</td>
						<td width="25%"> {{strtoupper($detail->pegawai->pegawai_jabatan)}}</td>
						<td width="25%"> GOL</td>
						<td width="25%"> {{ucwords($detail->pegawai->pegawai_golongan)}}</td>
					</tr>

					<tr>
						<td width="25%"> UNIT KERJA</td>
						<td width="25%"> PN KETAPANG</td>
						<td width="25%"> MASA KERJA</td>
						<td width="25%"> {{$detail->pegawai->pegawai_tmt}}</td>
					</tr>
				</table>
			</div>

			<!-- JENIS CUTI YANG DIAMBIL -->
			<div class="col-md-12 mt-3">
				<table class="table-bordered" width="100%">
					<tr>
						<td colspan="4"><b> II. JENIS CUTI YANG DIAMBIL</b></td>
					</tr>
					<tr>
						<td width="30%">1. CUTI TAHUNAN</td>
						<td width="20%">
							@if($detail->jenis_cuti_id == 1)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
						<td width="25%"> 2. CUTI BESAR</td>
						<td width="25%">
							@if($detail->jenis_cuti_id == 2)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
					</tr>

					<tr>
						<td width="30%"> 3. CUTI SAKIT</td>
						<td width="20%">
							@if($detail->jenis_cuti_id == 6)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
						<td width="25%"> 4. CUTI MELAHIRKAN</td>
						<td width="25%">
							@if($detail->jenis_cuti_id == 3)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
					</tr>

					<tr>
						<td width="30%"> 5. CUTI KARENA ALASAN PENTING</td>
						<td width="20%"> 
							@if($detail->jenis_cuti_id == 5)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
						<td width="25%"> 6. CUTI DILUAR TANGGUNGAN NEGARA</td>
						<td width="25%">
							@if($detail->jenis_cuti_id == 4)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
					</tr>
				</table>
			</div>


			<!-- ALASAN CUTI -->
			<div class="col-md-12 mt-3">
				<table class="table-bordered" width="100%">
					<tr>
						<td width="100%"><b> III. ALASAN CUTI</b></td>
					</tr>
					<tr>
						<td width="100%"> - {{$detail->alasan_cuti}}</td>
					</tr>
				</table>
			</div>

			<!-- LAMANYA CUTI -->
			<div class="col-md-12 mt-3">
				<table class="table-bordered" width="100%">
					<tr>
						<td width="100%" colspan="6"><b> IV. LAMANYA CUTI</b></td>
					</tr>
					<tr>
						<td width="15%"> SELAMA </td>
						<td width="15%">  {{App\Models\CutiDetail::where('id_cuti', $detail->cuti_id)->where('status_cuti',1)->count()}} HARI</td>
						<td width="15%"> MULAI TANGGAL </td>
						<td width="15%">{{Carbon\Carbon::parse($detail->tgl_mulai_cuti)->isoFormat('D MMMM Y')}}</td>
						<td width="5%">s/d</td>
						<td width="15%">{{Carbon\Carbon::parse($detail->tgl_selesai_cuti)->isoFormat('D MMMM Y')}}</td>
					</tr>
				</table>
			</div>

			<!-- CATATAN CUTI -->
			<div class="col-md-12 mt-3">
				<table class="table-bordered" width="100%">
					<tr>
						<td width="100%" colspan="6"><b> V. CATATAN CUTI</b></td>
					</tr>
					<tr>
						<td width="15%" colspan="3"> 1. CUTI TAHUNAN </td>
						<td width="15%" rowspan="2"> <center> PARAF PETUGAS <br> CUTI </center></td>
						<td width="15%"> 2. CUTI BESAR </td>
						<td width="10%"></td>
					</tr>
					<tr>
						<td>TAHUN</td>
						<td>SISA</td>
						<td>KETERANGAN</td>
						<td>3. CUTI SAKIT</td>
						<td style="width: 100px;">-</td>
					</tr>

					<!-- TR ISI -->
					<tr>
						<td>{{$tahun_2}}</td>
						<td>{{$sisa_2}} Hari</td>
						<td>-</td>
						<td rowspan="3">
							<center><br>
								{!! QrCode::size(50)->generate(url('orisinalitas/cuti',$detail->kode_token)); !!} <br>
								<b><u>{{ucwords($detail->kasubag->pegawai_nama)}}</u></b>
							</center>
						</td>
						<td>4. CUTI MELAHIRKAN</td>
						<td style="width: 100px;">-</td>
					</tr>
					<tr>
						<td>{{$tahun_1}}</td>
						<td>{{$sisa_1}} Hari</td>
						<td>-</td>
						<td>5. CUTI KARENA ALASAN PENTING</td>
						<td style="width: 100px;">-</td>
					</tr>
					<tr>
						<td> {{$tahun_sekarang}}</td>
						<td> {{$sisa_now}} Hari</td>
						<td> {{$hasil_sisa_cuti_tahunan}} - {{$jumlah_hari}} = {{$hasil_hari}} Hari</td>
						<td>6. CUTI DILUAR TANGGUNG NEGARA</td>
						<td style="width: 100px;">-</td>
					</tr>
				</table>
			</div>

			<!-- alamat selama cuti -->
			<div class="col-md-12 mt-3">
				<table class="table-bordered" width="100%">
					<tr>
						<td width="100%" colspan="3"><b> VI. ALAMAT SELAMA MENJALANKAN CUTI</b></td>
					</tr>
					<tr>
						<td rowspan="2">{{strtoupper($detail->alamat_selama_cuti)}}</td>
						<td>Telp.</td>
						<td>{{$detail->pegawai->notlp}}</td>
					</tr>
					<tr>
						<td colspan="2">
							


							<center><br>
								{!! QrCode::size(50)->generate(url('orisinalitas/cuti',$detail->kode_token)); !!} <br>
								<b><u>{{ucwords($ttd_pegawai->pegawai_nama)}}</u></b> <br>
								NIP. {{$ttd_pegawai->pegawai_nip}}
							</center>


						</td>
					</tr>
				</table>
			</div>


			<!-- PERTIMBANGAN ATASAN LANGSUNG -->
			<div class="col-md-12 mt-3">
				<table class="table-bordered" width="100%">
					<tr>
						<td width="100%" colspan="4"><b> VII. PERTIMBANGAN ATASAN LANGSUNG</b></td>
					</tr>
					<tr>
						<td>SETUJU</td>
						<td>PERUBAHAN</td>
						<td>DITANGGUHKAN</td>
						<td>TIDAK DISETUJUI</td>
					</tr>
					<tr>
						<td>@if($detail->cuti_status == 6)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
						<td>@if($detail->cuti_status == 7)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
						<td>@if($detail->cuti_status == 8)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
						<td>@if($detail->cuti_status == 5)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
					</tr>
					<tr>
						<td colspan="3"></td>
						<td height="100px">
							<center><br>
								 <br><br><br>
								<b><u>{{ucwords($pt->pt_nama)}}</u></b> <br>
								NIP. {{ucwords($pt->pt_nip)}}
							</center>
						</td>
					</tr>
				</table>
			</div>

			<!-- PERTIMBANGAN ATASAN LANGSUNG -->
			<div class="col-md-12 mt-3">
				<table class="table-bordered" width="100%">
					<tr>
						<td width="100%" colspan="4"><b> VIII. KEPUTUSAN ATASAN YANG BERWENANG MEMBERIKAN CUTI</b></td>
					</tr>
					<tr>
						<td>SETUJU</td>
						<td>PERUBAHAN</td>
						<td>DITANGGUHKAN</td>
						<td>TIDAK DISETUJUI</td>
					</tr>
					<tr>
						<td>@if($detail->cuti_status == 6)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
						<td>@if($detail->cuti_status == 7)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
						<td>@if($detail->cuti_status == 8)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
						<td>@if($detail->cuti_status == 5)
							<center><i class="fa fa-check"></i></center>
							@endif
						</td>
					</tr>
					<tr>
						<td colspan="3" ></td>
						<td height="100px">
							<center><br>
								 <br><br><br>
								<b><u>{{ucwords($pt->pt_nama)}}</u></b> <br>
								NIP. {{ucwords($pt->pt_nip)}}
							</center>
						</td>
					</tr>
				</table>
			</div>



		</div>

	</div>
</div>

<script>
	window.print()
</script>
</body>
</html>







