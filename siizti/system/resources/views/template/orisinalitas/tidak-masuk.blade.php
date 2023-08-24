<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ORISINALITAS IZIN</title>
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
	}
</style>
<body>
	<div class="row">
		<div class="col-md-12">
			<center>
				<div class="card" style="width: 400px; margin-top: 100px;">
					<div class="card-body">
						<img src="{{url('public/logo/pn-logo.png')}}" width="40%" alt="">
						<h5 class="mt-3">ORISINALITAS KELUAR KANTOR</h5>
						<div class="row">
							<div class="card bg-success"> <br>
								<h3 style="color:#ffffff"><b>STATUS VALID</b></h3>
							</div>
						</div>
						<table>
							<tr>
								<td colspan="2"><b>Yang bertandatangan dibawah ini : <br></b></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td>: {{ucwords($detail->pimpinanBidang->pegawai_nama)}}</td>
							</tr>
							<tr>
								<th>NIP</th>
								<td>: {{ucwords($detail->pimpinanBidang->pegawai_nip)}}</td>
							</tr>
							<tr>
								<th>Jabatan</th>
								<td>: {{ucwords($detail->pimpinanBidang->pegawai_jabatan)}}</td>
							</tr>

							<tr>
								<td colspan="2"><br><b>Memberikan izin kepada : <br></b></td>
							</tr>

							<tr>
								<th>Nama</th>
								<td>: {{ucwords($detail->pegawai->pegawai_nama)}}</td>
							</tr>
							<tr>
								<th>NIP</th>
								<td>: {{ucwords($detail->pegawai->pegawai_nip)}}</td>
							</tr>
							<tr>
								<th>Jabatan</th>
								<td>: {{ucwords($detail->pegawai->pegawai_jabatan)}}</td>
							</tr>
							<tr>
								<th>Alasan</th>
								<td width="75%">: {{$detail->alasan}}</td>
							</tr>

							<tr>
								<th>Tgl. Izin</th>
								<td width="75%">: {{$detail->tgl_mulai_izin}} - {{$detail->tgl_selesai_izin}} </td>
							</tr>


						</table>
					</div>
				</div>
			</center>
		</div>
	</div>
	



</body>
</html>







