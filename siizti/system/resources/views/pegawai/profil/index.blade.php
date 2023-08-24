@extends('template.base')
@section('title')
PROFIL AKUN
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

  <div class="row">
    <div class="col-md-12">


      <!-- nav -->

      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
          <a class="nav-link " href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
        </li>
        <li class="nav-item">

          <!-- Modal Backdrop -->
          <div class="me-1">
            <!-- Button trigger modal -->
            <button
            type="button"
            class="btn btn-warning"
            data-bs-toggle="modal"
            data-bs-target="#backDropModal"
            >
            <i class="fa fa-lock"></i> Ganti Password
          </button>

          <!-- Modal -->
          <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
              <form class="modal-content" action="{{url('p/profil-akun/ganti-password')}}/{{Auth::user()->pegawai_id}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title" id="backDropModalTitle">Ganti Password</h5>
                  <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                 <div class="form-group">
                  <input class="form-control mt-3" name="current" type="password"  required="" placeholder="Password Lama">
                </div>

                <div class="form-group">
                  <input class="form-control mt-3" name="confirm" type="password"  required="" placeholder="Password Baru">
                </div>

                <div class="form-group">
                  <input class="form-control mt-3" name="new" type="password"  required="" placeholder="Konfirmasi Password Baru">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  Close
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </li>
  </ul>




  <!-- end nav -->
  <div class="card mb-4">
    <h5 class="card-header">Profile Details</h5>
    <!-- Account -->
    <div class="card-body">
      <img src="{{url('public')}}/app/pegawai/{{Auth::user()->foto}}" width="100px" alt="">
      <div class="d-flex align-items-start align-items-sm-center gap-4">
      </div>
    </div>
    <hr class="my-0" />
    <div class="card-body">
     <div class="row">
      <div class="col-md-6 mt-3">
        <span>NIP Pegawai</span>

        <input type="text" readonly class="form-control" value="{{ucwords($detail->pegawai_nip)}}" name="pegawai_nama" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>Nama Pegawai</span>
        <input type="text" readonly class="form-control" value="{{ucwords($detail->pegawai_nama)}}" name="pegawai_nama" required ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>Jabatan</span>
        <input type="text" readonly class="form-control" value="{{ucwords($detail->pegawai_jabatan)}}" name="pegawai_jabatan" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>Golongan</span>
        <input type="text" readonly class="form-control" value="{{ucwords($detail->pegawai_golongan)}}" name="pegawai_golongan" required ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>Bidang Kerja</span>
        <select name="pegawai_bidang_id" readonly id="" class="form-control" required>
          <option value="" hidden>{{$detail->bidang->bidang_kode}} {{$detail->bidang->bidang_nama}}</option>
          @foreach($list_bidang as $b)
          <option value="{{$b->bidang_id}}">{{$b->bidang_kode}} - {{ucwords($b->bidang_nama)}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6 mt-3">
        <span>Tingkatan Pendidikan</span>
        <select name="pegawai_tingkat_pendidikan" readonly id="" class="form-control" required>
          <option value="" hidden>{{$detail->pegawai_tingkat_pendidikan}}</option>
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
        <input type="text" readonly class="form-control" value="{{ucwords($detail->pegawai_jurusan)}}" name="pegawai_jurusan" required ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>Agama</span>
        <select name="pegawai_agama" readonly id="" class="form-control" required>
          <option value="" hidden>{{$detail->pegawai_agama}}</option>
          <option value="ISLAM">ISLAM</option>
          <option value="KRISTEN">KRISTEN</option>
          <option value="HINDU">HINDU</option>
          <option value="BUDHA">BUDHA</option>
          <option value="KONGHUCU">KONGHUCU-</option>
        </select>
      </div>
      <div class="col-md-6 mt-3">
        <span>Jenis Kelamin</span>
        <select name="pegawai_jenis_kelamin" readonly id="" class="form-control" required>
          <option value="" hidden>{{$detail->pegawai_jenis_kelamin}}</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </div>

      <div class="col-md-6 mt-3">
        <span>TMT Kerja</span>
        <input type="date" readonly class="form-control" name="pegawai_tmt" value="{{$detail->pegawai_tmt}}" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>SK TMT</span>
        <input type="file" readonly class="form-control" name="pegawai_sk" required ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>No WhatsApp</span>
        <input type="number" readonly class="form-control" name="notlp" value="{{$detail->notlp}}" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>Email</span>
        <input type="email" readonly class="form-control" name="pegawai_email" value="{{ucwords($detail->pegawai_email)}}" required ></input>
      </div>

      <div class="col-md-6 mt-3">
        <span>Tempat Lahir</span>
        <input type="text" readonly class="form-control" name="tempat_lahir" value="{{ucwords($detail->tempat_lahir)}}" required ></input>
      </div>
      <div class="col-md-6 mt-3">
        <span>Tanggal Lahir</span>
        <input type="date" readonly class="form-control" name="tgl_lahir" value="{{$detail->tgl_lahir}}" required ></input>
      </div>


      <div class="col-md-6 mt-3">
        <form action="{{url('p/profil-akun',Auth::user()->pegawai_id)}}/update" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <span>Foto Pegawai</span>
        <input type="file" class="form-control" name="file" accept="image/*"></input>
        <button class="btn btn-primary float-right mt-3">UPDATE</button>
        </form>
      </div>
    </div>



  </div>
  <!-- /Account -->
</div>


</div>
</div>
</div>

@endsection