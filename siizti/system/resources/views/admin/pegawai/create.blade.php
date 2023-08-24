@extends('template.base')
@section('title')
PEGAWAI
@endsection

@section('content')
<div class="container mt-3 mb-5">
	<div class="row">
		
		<div class="col-lg-12 mb-4 order-0">
			<div class="card">
				<div class="d-flex align-items-end row">
					<div class="col-sm-7">
						<div class="card-body">
							<h5 class="card-title text-primary">Tambah Data Pegawai Pengadilan Negeri</h5>
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
	</div>


	
	<div class="card">
		<div class="card-body">
			<form action="{{url('admin/pegawai/create')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-6 mt-3">
						<span>NIP Pegawai</span>
						<div class="row">
							<div class="" style="width:30%">
								<input type="number" class="form-control" required name="nip1" placeholder="********"></input>
							</div>
							<div class="" style="width:30%">
								<input type="number" class="form-control" required name="nip2"  placeholder="********"></input>
							</div>
							<div class="" style="width:20%">
								<input type="number" class="form-control" required name="nip3" maxlength="1"  placeholder="********"></input>
							</div>

							<div class="" style="width:20%">
								<input type="number" class="form-control" required maxlength="3" name="nip4"  placeholder="********"></input>
							</div>
						</div>
						
					</div>
					<div class="col-md-6 mt-3">
						<span>Nama Pegawai</span>
						<input type="text" class="form-control" name="pegawai_nama" ></input>
					</div>

					<div class="col-md-6 mt-3">
						<span>Jabatan</span>
						<input type="text" class="form-control" required name="pegawai_jabatan" required ></input>
					</div>

					<div class="col-md-6 mt-3">
						<span>Unit Kerja</span>
						<input type="text" class="form-control" required name="pegawai_unit_kerja" ></input>
					</div>
					<div class="col-md-6 mt-3">
						<span>Pangkat</span>
						<input type="text" class="form-control" required name="pegawai_pangkat"  ></input>
					</div>

					<div class="col-md-6 mt-3">
						<span>Golongan</span>
						<input type="text" class="form-control" required name="pegawai_golongan"  ></input>
					</div>

					<div class="col-md-6 mt-3">
						<span>Bidang Kerja</span>
						<select name="pegawai_bidang_id" id="" class="form-control"required  >
							<option value="" hidden>--Pilih Bidang Kerja--</option>
							@foreach($list_bidang as $b)
							<option value="{{$b->bidang_id}}">{{$b->bidang_kode}} - {{ucwords($b->bidang_nama)}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6 mt-3">
						<span>Tingkatan Pendidikan</span>
						<select name="pegawai_tingkat_pendidikan" id="" class="form-control"required  >
							<option value="" hidden>--Pilih Tingkat Pendidikan--</option>
							<option value="SD">SD</option>
							<option value="SMP">SMP</option>
							<option value="SMA/SMK">SMA/SMK</option>
							<option value="D-I">D-I</option>
							<option value="D-II">D-II</option>
							<option value="D-III">D-III</option>
							<option value="D-IV">D-IV</option>
							<option value="S1">S-1</option>
							<option value="S2">S-2</option>
							<option value="S3">S-3</option>
						</select>
					</div>
					<div class="col-md-6 mt-3">
						<span>Jurusan Pendidikan</span>
						<input type="text" class="form-control" name="pegawai_jurusan" ></input>
					</div>

					<div class="col-md-6 mt-3">
						<span>Agama</span>
						<select name="pegawai_agama" id="" class="form-control" required >
							<option value="" hidden>--Pilih Agama--</option>
							<option value="ISLAM">ISLAM</option>
							<option value="KRISTEN">KRISTEN</option>
							<option value="HINDU">HINDU</option>
							<option value="BUDHA">BUDHA</option>
							<option value="KONGHUCU">KONGHUCU-</option>
						</select>
					</div>
					<div class="col-md-6 mt-3">
						<span>Jenis Kelamin</span>
						<select name="pegawai_jenis_kelamin" id="" class="form-control" required >
							<option value="" hidden>--Pilih Jenis Kelamin--</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
							<option value="Lainnya">Lainnya</option>
						</select>
					</div>

					<div class="col-md-6 mt-3">
						<span>TMT Kerja</span>
						<input type="date" class="form-control" required name="pegawai_tmt" ></input>
					</div>
					<div class="col-md-6 mt-3">
						<span>SK TMT</span>
						<input type="file" class="form-control" required name="pegawai_sk"  ></input>
					</div>

					<div class="col-md-6 mt-3">
						<span>No WhatsApp</span>
						<input type="number" class="form-control" name="notlp"  ></input>
					</div>
					<div class="col-md-6 mt-3">
						<span>Email</span>
						<input type="email" class="form-control" required name="pegawai_email"  ></input>
					</div>

					<div class="col-md-6 mt-3">
						<span>Tempat Lahir</span>
						<input type="text" class="form-control" required name="tempat_lahir"  ></input>
					</div>
					<div class="col-md-6 mt-3">
						<span>Tanggal Lahir</span>
						<input type="date" class="form-control" required name="tgl_lahir" ></input>
					</div>
				</div>

				<div class="col-md-12">
					<center>
						<button class="btn btn-primary mt-3">SIMPAN</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection