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
						<h5 class="card-title text-primary">Form Pengajuan Cuti</h5>
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
			<form action="{{url('p/permohonan/cuti/create')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">

					<div class="col-md-6 mt-3">
						<span>Jenis Cuti</span>
						<select required name="jenis_cuti_id" id="pilihan" class="form-control mb-3	">
							<option value="" hidden>-- Pilih Jenis Cuti --</option>
							
						
							<option value="1" id="form1">CUTI TAHUNAN</option>
							<option value="besar">CUTI BESAR</option>
							<option value="melahirkan">CUTI MELAHIRKAN</option>
							<option value="negara">CUTI DILUAR TANGGUNGAN NEGARA</option>
							<option value="penting">CUTI KARENA ALASAN PENTING</option>
							<option value="sakit">CUTI SAKIT</option>
						</select>

						<div class="col-md-12">
							<div id="formContainer">
								<!-- Form baru akan ditampilkan di sini -->
							</div>
						</div>
					</div>

				

					<div class="col-md-6 mt-3">
						<span>Tanggal Mulai Cuti</span>
						<input type="date" class="form-control" required name="tgl_mulai_cuti">
					</div>

					<div class="col-md-6 mt-3">
						<span>Tanggal Selesai Cuti</span>
						<input type="date" class="form-control" required name="tgl_selesai_cuti">
					</div>

					

					<div class="col-md-6 mt-3">
						<span>Alasan Cuti</span>
						<textarea required name="alasan_cuti" id="" cols="30" rows="3" class="form-control"></textarea>
					</div>

					<div class="col-md-6 mt-3">
						<span>Alamat Selama Menjalankan Cuti</span>
						<textarea required name="alamat_selama_cuti" id="" cols="30" rows="3" class="form-control"></textarea>
					</div>

					<div class="col-md-6 mt-3">
						<span>Kasubbag</span>
						<select required name="kasubag_id" id="" class="form-control">
							<option value="{{$kasubag->pegawai_id}}">{{$kasubag->pegawai_nama}}</option>
							@foreach($plh_kasubag as $plh)
							<option value="{{$plh->pengganti->pegawai_id}}">Plh. {{strtoupper($plh->pengganti->pegawai_nama)}}</option>
							@endforeach

							@foreach($plt_kasubag as $plt)
							<option value="{{$plt->pengganti->pegawai_id}}">Plt. {{strtoupper($plt->pengganti->pegawai_nama)}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6 mt-3">
						<span>Atasan</span>
						<select required name="atasan_id" id="" class="form-control">
							<option value="{{$pimpinanpn->pegawai_id}}">{{$pimpinanpn->pegawai_nama}}</option>
							@foreach($list_kabid as $b)
							<option value="{{$b->pegawai_id}}">{{$b->pegawai_nama}}</option>
							@endforeach



							@foreach($plh_atasan as $plh)
							<option value="{{$plh->pengganti->pegawai_id}}">Plh. {{strtoupper($plh->pengganti->pegawai_nama)}}</option>
							@endforeach

							@foreach($plt_atasan as $plt)
							<option value="{{$plt->pengganti->pegawai_id}}">Plt. {{strtoupper($plt->pengganti->pegawai_nama)}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6 mt-3">
						<span>Ketua Pengadilan</span>
						<select required name="pimpinan_id" id="" class="form-control">
							<option value="{{$pimpinan->pegawai_id}}">{{strtoupper($pimpinan->pegawai_nama)}}</option>
							@foreach($plh_pimpinan as $plh)
							<option value="{{$plh->pengganti->pegawai_id}}">Plh. {{strtoupper($plh->pengganti->pegawai_nama)}}</option>
							@endforeach

							@foreach($plt_pimpinan as $plt)
							<option value="{{$plt->pengganti->pegawai_id}}">Plt. {{strtoupper($plt->pengganti->pegawai_nama)}}</option>
							@endforeach
						</select>
					</div>

					


				</div>


				<div class="col-md-12">
					<button class="btn btn-primary float-right mt-3" style="float: right;">SIMPAN</button>

				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>

	

	const pilihanSelect = document.getElementById('pilihan');
	const formContainer = document.getElementById('formContainer');

	function tampilkanFormYangDipilih() {
		const pilihan = pilihanSelect.value;

		formContainer.innerHTML = '';

		switch (pilihan) {
		case 'besar':
			formContainer.innerHTML = `
			<span>File Pendukung Cuti Besar</span>
			<input type="hidden" class="form-control" name="jenis_cuti_id" value="2" name="text">
			<input type="file" class="form-control" name="file">
			`;	
			break;

			case 'melahirkan':
			formContainer.innerHTML = `
			<span>File Pendukung Cuti Melahirkan</span>
			<input type="hidden" class="form-control" name="jenis_cuti_id" value="3" name="text">
			<input type="file" class="form-control" name="file">
			`;	
			break;

			case 'negara':
			formContainer.innerHTML = `
			<span>File Pendukung Cuti</span>
			<input type="hidden" class="form-control" name="jenis_cuti_id" value="4" name="text">
			<input type="file" class="form-control" name="file">
			`;	
			break;

			case 'penting':
			formContainer.innerHTML = `
			<span>File Pendukung Cuti Penting</span>
			<input type="hidden" class="form-control" name="jenis_cuti_id" value="5" name="text">
			<input type="file" class="form-control" name="file">
			`;	
			break;

			case 'sakit':
			formContainer.innerHTML = `
			<span>File Pendukung Cuti Sakit</span>
			<input type="hidden" class="form-control" name="jenis_cuti_id" value="6" name="text">
			<input type="file" class="form-control" name="file">
			`;	
			break;
		
      // Tambahkan kasus lain jika diperlukan untuk form lainnya
		default:
			formContainer.innerHTML = '';
			break;
		}
	}

	pilihanSelect.addEventListener('change', tampilkanFormYangDipilih);

	tampilkanFormYangDipilih();
</script>
@endsection