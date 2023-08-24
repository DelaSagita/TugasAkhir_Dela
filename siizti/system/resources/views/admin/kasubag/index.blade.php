@extends('template.base')
@section('title')
DETAIL KASUBAG
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

  <div class="row">
    <div class="col-md-12">

      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Modal Backdrop -->
            <div class="mt-3">
              <!-- Button trigger modal -->
              <div class="container">
                
              <button
              type="button"
              class="btn btn-danger"
              data-bs-toggle="modal"
              data-bs-target="#backDropModal"
              style="float: right;"
              >
              Ganti Kasubbag Keportala
            </button>
              </div>

            <!-- Modal -->
            <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
              <div class="modal-dialog">
                <form class="modal-content" action="{{url('admin/pengaturan/kasubag/update')}}" method="post">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Ganti Kasubbag Keportala</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col mb-3">
                        <select class="form-control" required name="kasubag_baru">
                          <option value="" hidden> -- Pilih Pimpinan Baru --</option>
                          @foreach($list_pegawai as $p)
                          <option value="{{$p->pegawai_id}}">{{strtoupper($p->pegawai_nama)}} - {{$p->pegawai_nip}}</option>
                          @endforeach
                        </select>

                        <input type="hidden" name="kasubag_lama" value="{{$detail->pegawai_id}}">
                        
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


        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
           
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
         <div class="row">
          <div class="col-md-6 mt-3">
            <span>NIP Pegawai</span>

            <input type="text" class="form-control" value="{{ucwords($detail->pegawai_nip)}}" name="pegawai_nama" required ></input>
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
            <span>Golongan</span>
            <input type="text" class="form-control" value="{{ucwords($detail->pegawai_golongan)}}" name="pegawai_golongan" required ></input>
          </div>

          <div class="col-md-6 mt-3">
            <span>Bidang Kerja</span>
            <select name="pegawai_bidang_id" id="" class="form-control" required>
              <option value="" hidden>{{$detail->bidang->bidang_kode}} {{$detail->bidang->bidang_nama}}</option>
              @foreach($list_bidang as $b)
              <option value="{{$b->bidang_id}}">{{$b->bidang_kode}} - {{ucwords($b->bidang_nama)}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6 mt-3">
            <span>Tingkatan Pendidikan</span>
            <select name="pegawai_tingkat_pendidikan" id="" class="form-control" required>
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
            <input type="text" class="form-control" value="{{ucwords($detail->pegawai_jurusan)}}" name="pegawai_jurusan" required ></input>
          </div>

          <div class="col-md-6 mt-3">
            <span>Agama</span>
            <select name="pegawai_agama" id="" class="form-control" required>
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
            <select name="pegawai_jenis_kelamin" id="" class="form-control" required>
              <option value="" hidden>{{$detail->pegawai_jenis_kelamin}}</option>
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
            <input type="file" class="form-control" name="pegawai_sk" required ></input>
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

      </div>
      <!-- /Account -->
    </div>

    @if($detail->pegawai_status == "PEGAWAI AKTIF")
    <div class="card">
      <h5 class="card-header">Pensiunkan Akun</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading fw-bold mb-1">Apakah anda yakin untuk melakukan pensiun pada akun {{ucwords($detail->pegawai_nama)}}?</h6>
            <p class="mb-0">Data {{ucwords($detail->pegawai_nama)}} tidak akan hilang, Akun yang telah dipensiunkan tidak akan bisa masuk ke Aplikasi lagi</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return true" action="{{url('o/kepegawaian/pegawai',$detail->pegawai_id)}}/pensiunkan" method="post">
          @csrf
          @method("PUT")
          <div class="form-check mb-3">
            <input
            class="form-check-input"
            type="checkbox"
            name="accountActivation"
            id="accountActivation" required
            />
            <label class="form-check-label" for="accountActivation"
            >I confirm my account deactivation</label
            >
          </div>
          <button type="submit" class="btn btn-danger deactivate-account">Pensiunkan Pegawai</button>
        </form>
      </div>
    </div>
    @elseif($detail->pegawai_status == "PENSIUN")
       <div class="card">
      <h5 class="card-header">Pensiunkan Akun</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-success">
            <h6 class="alert-heading fw-bold mb-1">Apakah anda yakin untuk mengaktifkan pada akun {{ucwords($detail->pegawai_nama)}}?</h6>
            <p class="mb-0">Akun yang telah diaktifkan akan bisa masuk ke aplikasi kembali!!!</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return true" action="{{url('o/kepegawaian/pegawai',$detail->pegawai_id)}}/aktifkan" method="post">
          @csrf
          @method("PUT")
          <div class="form-check mb-3">
            <input
            class="form-check-input"
            type="checkbox"
            name="accountActivation"
            id="accountActivation" required
            />
            <label class="form-check-label" for="accountActivation"
            >I confirm my account deactivation</label
            >
          </div>
          <button type="submit" class="btn btn-success deactivate-account">Aktifkan Pegawai</button>
        </form>
      </div>
    </div>
    @endif


  </div>
</div>
</div>

@endsection