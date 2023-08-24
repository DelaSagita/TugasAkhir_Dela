<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{$detail->pegawai->pegawai_nama}} - IZIN KELUAR KANTOR - {{$detail->tgl_izin}}</title>
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

	@if($detail->status == 1)
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


			<div class="col-md-12">
				<table>
					<tr>
						<td style="width: 50%;"></td>
						<td style="width: 50%;">
							Lampiran II <br>
							<p style="align: justify-all;">
							Peraturan Mahkamah Agung RI Nomor 7 Tahun 2016 tentang
							Penegakan Disiplin Kerja Hakim pada Mahkamah Agung dan Badan Peradilan Yang Berada dibawahnya
							</p>
						</td>
					</tr>
				</table>
			</div>

			<div class="mt-4">
				<center>
					<b><u>IZIN KELUAR KANTOR</u></b>
				</center>
			</div>

			<div class="col-md-12 mt-4">
				<table class=" table-borderless">
					<tr>
						<td width="40%">Yang bertandatangan dibawah ini</td>
						<td> : </td>
						<td> &nbsp; {{ucwords($detail->pimpinanBidang->pegawai_nama)}}</td>
					</tr>

					<tr>
						<td width="40%">Selaku</td>
						<td> : </td>
						<td> &nbsp; {{ucwords($detail->pimpinanBidang->pegawai_jabatan)}}</td>
					</tr>

					<tr>
						<td width="40%">Dengan ini memberikan izin kepada </td>
						<td> : </td>
						<td> &nbsp; {{ucwords($detail->pegawai->pegawai_nama)}}<br>
							&nbsp; NIP. {{$detail->pegawai->pegawai_nip}}

						</td>
					</tr>

					<tr>
						<td width="40%">Untuk keluar kantor pada</td>
						<td> : </td>
						<td> &nbsp;{{Carbon\Carbon::parse($detail->tgl_izin)->isoFormat('dddd')}},   {{Carbon\Carbon::parse($detail->tgl_izin)->Format('d M Y')}} <br>
							&nbsp; Pukul {{$detail->jam_mulai}} s.d {{$detail->jam_mulai}}
						</td>
					</tr>

					<tr>
						<td width="40%">Untuk Keperluan</td>
						<td> : </td>
						<td> &nbsp; {{$detail->alasan}}</td>
					</tr>
				</table>

				<p class="mt-3">Demikian izin ini diberikan kepada yang bersangkutan untuk digunakan sebagaimana mestinya</p>


			</div>

			<div class="col-md-12">
				<table class="table table-borderless">
					<tr>
						<td style="width: 50%;"></td>
						<td style="width: 50%;">
							

							<center>
								Ketapang, {{Carbon\Carbon::parse($detail->tgl_izin)->Format('d M Y')}} <br>
								&nbsp; &nbsp; &nbsp; &nbsp; Pejabat pemberi izin <br>
								{!! QrCode::size(100)->generate(url('orisinalitas/keluar-kantor',$detail->kode_token)); !!} <br>
								<b><u>{{ucwords($detail->pimpinanBidang->pegawai_nama)}}</u></b> <br>
								NIP. {{$detail->pimpinanBidang->pegawai_nip}}
							</center>
							
						</td>
					</tr>
				</table>
			</div>
		</div>

	</div>

	<script>
		setTimeout(function () { window.print(); }, 500);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
	</script>
	@else
	<div class="row">
		<div class="col-md-12">
				<div class="bg-secoundary" style="margin-bottom: 100px !important;">
					<center>
						<img src="{{url('public/logo/pn-logo.png')}}" class="mt-5" width="200px" alt="">
						<h3 class="mt-2">IZIN BELUM DIKONFIRMASI OLEH ATASAN</h3>
						<button onclick="history.back()"> Kembali</button>
					</center>
				</div>
		</div>
	</div>

	<script>
        window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
	</script>
	@endif

</body>
</html>







