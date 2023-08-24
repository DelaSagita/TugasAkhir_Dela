@extends('template.base')
@section('title')
PROFIL AKUN
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

  <div class="row">
    <div class="col-md-12">

  <!-- end nav -->
  <div class="card mb-4">
    <h5 class="card-header">Profile Details</h5>
    <!-- Account -->
    <div class="card-body">
      <div class="d-flex align-items-start align-items-sm-center gap-4">

        <form action="{{url('admin/pegawai',$detail->pegawai_id)}}/update" method="post" enctype="multipart/form-data">
          @csrf
          @method("PUT")
        
      </div>
    </div>
    <hr class="my-0" />
    <div class="card-body">
     <div class="row">
      <div class="col-md-6 mt-3">
        <span>NIP Pegawai</span>

        <input type="text" class="form-control" value="{{ucwords($detail->pegawai_nip)}}" name="nip" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>Nama Pegawai</span>
        <input type="text" class="form-control" value="{{ucwords($detail->pegawai_nama)}}" name="pegawai_nama" required ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>Jabatan</span>
        <input type="text" class="form-control" value="{{ucwords($detail->pegawai_jabatan)}}" name="pegawai_jabatan" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>Pangkat</span>
        <input type="text" class="form-control" value="{{ucwords($detail->pegawai_pangkat)}}" name="pegawai_pangkat" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>Golongan</span>
        <input type="text" class="form-control" value="{{ucwords($detail->pegawai_golongan)}}" name="pegawai_golongan" required ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>Bidang Kerja</span>
        <select name="pegawai_bidang_id" id="" class="form-control" required>
          <option value="{{Auth::user()->pegawai_bidang_id}}" hidden>{{$detail->bidang->bidang_nama}}</option>
          @foreach($list_bidang as $b)
          <option value="{{$b->bidang_id}}">{{ucwords($b->bidang_nama)}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6 mt-3">
        <span>Tingkatan Pendidikan</span>
        <select name="pegawai_tingkat_pendidikan" id="" class="form-control" required>
          <option value="{{$detail->pegawai_tingkat_pendidikan}}" hidden>{{$detail->pegawai_tingkat_pendidikan}}</option>
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
        <input type="text" class="form-control" value="{{ucwords($detail->pegawai_jurusan)}}" name="pegawai_jurusan" required ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>Agama</span>
        <select name="pegawai_agama" id="" class="form-control" required>
          <option value="{{$detail->pegawai_agama}}" hidden>{{$detail->pegawai_agama}}</option>
          <option value="ISLAM">ISLAM</option>
          <option value="KRISTEN">KRISTEN</option>
          <option value="HINDU">HINDU</option>
          <option value="BUDHA">BUDHA</option>
          <option value="KONGHUCU">KONGHUCU-</option>
        </select>
      </div>
      <div class="col-md-6 mt-3">
        <span>Jenis Kelamin</span>
        <select name="pegawai_jenis_kelamin" id="" class="form-control" required>
          <option value="{{$detail->pegawai_jenis_kelamin}}" hidden>{{$detail->pegawai_jenis_kelamin}}</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </div>

      <div class="col-md-6 mt-3">
        <span>TMT Kerja</span>
        <input type="date" class="form-control" name="pegawai_tmt" value="{{$detail->pegawai_tmt}}" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>SK TMT</span>
        <input type="file" class="form-control" name="pegawai_sk" ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>No WhatsApp</span>
        <input type="number" class="form-control" name="notlp" value="{{$detail->notlp}}" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>Email</span>
        <input type="email" class="form-control" name="pegawai_email" value="{{ucwords($detail->pegawai_email)}}" required ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>Tempat Lahir</span>
        <input type="text" class="form-control" name="tempat_lahir" value="{{ucwords($detail->tempat_lahir)}}" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>Tanggal Lahir</span>
        <input type="date" class="form-control" name="tgl_lahir" value="{{$detail->tgl_lahir}}" required ></input>
      </div>
    </div>

    <div class="col-md-12">
     <button class="btn btn-primary float-right mt-3 mb-3">Simpan</button>
    </div>

   </form>

  </div>
  <!-- /Account -->
</div>


</div>
</div>
</div>

@endsection