@extends('template.base')
@section('title')
DETAIL PERMOHONAN CUTI
@endsection

@section('content')
<style>
  .timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
  }

  .timeline:before {
    top: 0;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 3px;
    background-color: #eeeeee;
    left: 10%;
    margin-left: -1.5px;
  }

  .timeline > li {
    margin-bottom: 20px;
    position: relative;
  }

  .timeline > li:before,
  .timeline > li:after {
    content: " ";
    display: table;
  }

  .timeline > li:after {
    clear: both;
  }

  .timeline > li:before,
  .timeline > li:after {
    content: " ";
    display: table;
  }

  .timeline > li:after {
    clear: both;
  }

  .timeline > li > .timeline-panel {
    width: 80%;
    float: left;
    border: 1px solid #d4d4d4;
    border-radius: 2px;
    padding: 20px;
    position: relative;
    -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  }

  .timeline > li > .timeline-panel:before {
    position: absolute;
    top: 26px;
    right: -15px;
    display: inline-block;
    border-top: 15px solid transparent;
    border-left: 15px solid #ccc;
    border-right: 0 solid #ccc;
    border-bottom: 15px solid transparent;
    content: " ";
  }

  .timeline > li > .timeline-panel:after {
    position: absolute;
    top: 27px;
    right: -5px;
    display: inline-block;
    border-top: 14px solid transparent;
    border-left: 14px solid #fff;
    border-right: 0 solid #fff;
    border-bottom: 14px solid transparent;
    content: " ";
  }

  .timeline > li > .timeline-badge {
    color: #fff;
    width: 50px;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
    text-align: center;
    position: absolute;
    top: 16px;
    left: 10%;
    margin-left: -25px;
    background-color: #999999;
    z-index: 100;
    border-top-right-radius: 50%;
    border-top-left-radius: 50%;
    border-bottom-right-radius: 50%;
    border-bottom-left-radius: 50%;
  }

  .timeline > li.timeline-inverted > .timeline-panel {
    float: right;
  }

  .timeline > li.timeline-inverted > .timeline-panel:before {
    border-left-width: 0;
    border-right-width: 15px;
    left: -15px;
    right: auto;
  }

  .timeline > li.timeline-inverted > .timeline-panel:after {
    border-left-width: 0;
    border-right-width: 14px;
    left: -14px;
    right: auto;
  }

  .timeline-badge.primary {
    background-color: #2e6da4 !important;
  }

  .timeline-badge.success {
    background-color: #3f903f !important;
  }

  .timeline-badge.warning {
    background-color: #f0ad4e !important;
  }

  .timeline-badge.danger {
    background-color: #d9534f !important;
  }

  .timeline-badge.info {
    background-color: #5bc0de !important;
  }

  .timeline-title {
    margin-top: 0;
    font-size: 10pt;
    font-weight:  bold;
    color: inherit;
  }

  .timeline-body > p,
  .timeline-body > ul {
    font-size: 9pt;
    margin-bottom: 0;
  }

  .timeline-body > p + p {
    margin-top: 5px;
  }

  @media (max-width: 767px) {
    ul.timeline:before {
      left: 40px;
    }

    ul.timeline > li > .timeline-panel {
      width: calc(100% - 90px);
      width: -moz-calc(100% - 90px);
      width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
      left: 15px;
      margin-left: 0;
      top: 16px;
    }

    ul.timeline > li > .timeline-panel {
      float: right;
    }

    ul.timeline > li > .timeline-panel:before {
      border-left-width: 0;
      border-right-width: 15px;
      left: -15px;
      right: auto;
    }

    ul.timeline > li > .timeline-panel:after {
      border-left-width: 0;
      border-right-width: 14px;
      left: -14px;
      right: auto;
    }
  }

</style>
<div class="container mt-3">
  <div class="row">
    <div class="col-md-6">
      <div class="card mt-5">
        <div class="card-body">
          <b>Yang Meminta Izin Cuti</b>
          <table class="table table-borderless table-hover">
            @if($detail->cuti_status > 1)
            <tr>
              <th width="300px">No. Surat Izin</th>
              <td>: {{strtoupper($detail->no_surat)}}</td>
            </tr>
            @endif

            <tr>
              <th width="300px">Nama Pegawai</th>
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
              <th>Jenis Cuti Yang Diambil</th>
              <td>: {{ucwords($detail->jeniscuti->nama_cuti)}}</td>
            </tr>

            <tr>
              <th>Tanggal Cuti</th>
              <td>: {{$detail->tgl_mulai_cuti}} s/d {{$detail->tgl_selesai_cuti}} </td>
            </tr>

            

            <tr>
              <th>Dengan Alasan</th>
              <td>: {{$detail->alasan_cuti}}</td>
            </tr>

            <tr>
              <th>Alamat Selama Cuti</th>
              <td>: {{ucwords($detail->alamat_selama_cuti)}}</td>
            </tr>
            @if($detail->jenis_cuti_id >2 )
            <tr>
              <th>File Pendukung</th>
              <td>:  
                <a href="{{url('public')}}/app/file/{{$detail->file_pendukung}}" download="" class="btn btn-dark btn-sm"> Download File</a>
              </td>
              </tr>
              @endif
              <tr>
                <th>Alamat Selama Cuti</th>
                <td>: {{ucwords($detail->alamat_selama_cuti)}}</td>
              </tr>


              <tr>
                <th>Tindakan</th>
                <td>

                  @if($detail->cuti_status == 0 && Auth::user()->pegawai_pimpinan == 3)
                  <div class="mt-3 row">

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#backDropModal"><i class="fa fa-times"></i> Tolak </button>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#backDropModalTerima"> <i class="fa fa-check"></i> Terima </button>

                    <!-- Modal Terima kasubag -->
                    <div class="modal fade" id="backDropModalTerima" data-bs-backdrop="static" tabindex="-1">
                      <div class="modal-dialog">
                        <form class="modal-content" action="{{url('p/permohonan-masuk/cuti',$detail->cuti_id)}}/terima-kasubag" method="post">
                          @csrf
                          @method("PUT")
                          <div class="modal-header">
                            <h5 class="modal-title" id="backDropModalTitle">Penomoran Surat Izin Cuti</h5>
                            <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            ></button>
                          </div>
                          <div class="modal-body">
                           <input type="text" placeholder="Nomor Surat Izin Cuti" name="no_surat" class="form-control" required>
                         </div>
                         <div class="modal-footer">
                          <button type="submit" class="btn btn-success">TERIMA</button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <!-- modal tolak kasubag -->
                  <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <form class="modal-content" action="{{url('p/permohonan-masuk/cuti',$detail->cuti_id)}}/tolak-kasubag" method="post">
                        @csrf
                        @method("PUT")
                        <div class="modal-header">
                          <h5 class="modal-title" id="backDropModalTitle">Alasan Penolakan</h5>
                          <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                          <textarea name="alasan_tolak" id="" cols="30" rows="5" class="form-control" placeholder="Alasan Penolakan"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger">TOLAK</button>
                        </div>
                      </form>
                    </div>
                  </div>


                </div>

                @elseif($detail->cuti_status == 1 && Auth::user()->pegawai_pimpinan == 3)
                <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i> CUTI DITOLAK</button> <br>
                <p><b>Alasan Penolakan :</b> {{$detail->alasan_tolak}}</p>
                @elseif($detail->cuti_status == 2 && Auth::user()->pegawai_pimpinan == 3)
                <button class="btn btn-success btn-sm"><i class="fa fa-check"></i> CUTI DITERIMA</button> <br>
                <b>Menunggu konfirmasi Kepala Bidang pegawai</b>

                @elseif($detail->cuti_status == 2 && Auth::user()->pegawai_pimpinan == 2)
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolakKabid"><i class="fa fa-times"></i> Tolak </button>
                <div class="modal fade" id="tolakKabid" data-bs-backdrop="static" tabindex="-1">
                  <div class="modal-dialog">
                    <form class="modal-content" action="{{url('p/permohonan-masuk/cuti',$detail->cuti_id)}}/tolak-kabid" method="post">
                      @csrf
                      @method("PUT")
                      <div class="modal-header">
                        <h5 class="modal-title" id="backDropModalTitle">Alasan Penolakan</h5>
                        <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <textarea name="alasan_tolak" id="" cols="30" rows="5" class="form-control" placeholder="Alasan Penolakan"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">TOLAK</button>
                      </div>
                    </form>
                  </div>
                </div>

                <a href="{{url('p/permohonan-masuk/cuti',$detail->cuti_id)}}/terima-kabid" onclick="return confirm('Yakin Menerima Izin Ini?')" class="btn btn-success btn-block"><i class="fa fa-check"></i> Terima</a>


                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#perubahanKabid"><i class="fa fa-times"></i> PERUBAHAN </button>

                <div class="modal fade" id="perubahanKabid" data-bs-backdrop="static" tabindex="-1">
                  <div class="modal-dialog">
                    <form class="modal-content" action="{{url('p/permohonan-masuk/cuti',$detail->cuti_id)}}/tolak-kabid" method="post">
                      @csrf
                      @method("PUT")
                      <div class="modal-header">
                        <h5 class="modal-title" id="backDropModalTitle">Keterangan Perubahan</h5>
                        <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <textarea name="perubahan" id="" cols="30" rows="5" class="form-control" placeholder="Alasan Penolakan"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">PERUBAHAN</button>
                      </div>
                    </form>
                  </div>
                </div>



                @elseif($detail->cuti_status == 3 && Auth::user()->pegawai_pimpinan >= 1)
                <button class="btn btn-danger btn-sm">DITOLAK OLEH ATASAN BIDANG</button> <br>
                <p><b>Alasan Penolakan :</b> {{$detail->alasan_tolak}}</p>

                @elseif($detail->cuti_status == 4 && Auth::user()->pegawai_pimpinan > 1)
                <button class="btn btn-success btn-sm">CUTI DITERIMA OLEH KEPALA BIDANG</button> <br>
                <b>Menunggu konfirmasi Kepala Pimpinan PN.</b>

                @elseif($detail->cuti_status == 4 && Auth::user()->pegawai_pimpinan == 1)

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolakPimpinan"><i class="fa fa-times"></i> Tolak </button>
                <div class="modal fade" id="tolakPimpinan" data-bs-backdrop="static" tabindex="-1">
                  <div class="modal-dialog">
                    <form class="modal-content" action="{{url('p/permohonan-masuk/cuti',$detail->cuti_id)}}/tolak-pimpinan" method="post">
                      @csrf
                      @method("PUT")
                      <div class="modal-header">
                        <h5 class="modal-title" id="backDropModalTitle">Alasan Penolakan</h5>
                        <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <textarea name="alasan_tolak" id="" cols="30" rows="5" class="form-control" placeholder="Alasan Penolakan"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">TOLAK</button>
                      </div>
                    </form>
                  </div>
                </div>

                <a href="{{url('p/permohonan-masuk/cuti',$detail->cuti_id)}}/terima-pimpinan" onclick="return confirm('Yakin Menerima Izin Ini?')" class="btn btn-success btn-block"><i class="fa fa-check"></i> Terima</a>

                @endif





             </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="container">
        <div class="container">
          <div class="card mt-5">
            <div class="card-body">
              <ul class="timeline">


                @if($detail->cuti_status == 0)
              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Baru</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diajukan, menunggu verifikasi Kasubbag Keportala </p>
                  </div>
                </div>
              </li>
              @endif

              @if($detail->cuti_status == 1)

              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Baru</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diajukan, menunggu verifikasi Kasubbag Keportala </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title" style="color: #c70039">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Ditolak Kasubbag Keportala </h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah ditolak oleh Kasubbag Keportala dengan alasan <b>{{$detail->alasan_tolak}}</b> </p>
                  </div>
                </div>
              </li>
              @endif


              @if($detail->cuti_status == 2)

              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Baru</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diajukan, menunggu verifikasi Kasubbag Keportala</p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Kasubbag Keportala </h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi Atasan </p>
                  </div>
                </div>
              </li>
              @endif


              @if($detail->cuti_status == 3)

              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Baru</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diajukan, menunggu verifikasi Kasubbag Keportala </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Kasubbag Keportala</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi Atasan  </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title" style="color:#c70039;">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Ditolak Oleh Atasan</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} ditolak oleh Atasan dengan alasan <b>{{$detail->alasan_tolak}}</b> </p>
                  </div>
                </div>
              </li>
              @endif


              @if($detail->cuti_status == 4)

              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Baru</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diajukan, menunggu verifikasi Kasubbag Keportala </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Kasubbag Keportala</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi Atasan </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title" >Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Atasan</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi Pimpinan Tertinggi </p>
                  </div>
                </div>
              </li>
              @endif


              @if($detail->cuti_status == 5)

              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Baru</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diajukan, menunggu verifikasi Kasubbag Keportala</p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Kasubbag Keportala</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi Atasan  </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title" >Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Kepala Bidang</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi oleh Pimpinan Tertinggi </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title" style="color:#c70039">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Ditolak Oleh Pimpinan Tertinggi</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} ditolak oleh Pimpinan Tertinggi dengan alasan <b>{{$detail->alasan_tolak}}</b></p>
                  </div>
                </div>
              </li>
              
              @endif


              @if($detail->cuti_status == 6)

              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Baru</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diajukan, menunggu verifikasi Kasubbag Keportala</p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Kasubbag Keportala</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi Atasan </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title" >Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Atasan</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi Pimpinan Tertinggi </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title" >Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Pimpinan Tertinggi</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diterima oleh Pimpinan Tertinggi dengan </b></p>
                  </div>
                </div>
              </li>

              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title" >Selesai</h4>
                  </div>
                  <div class="timeline-body">
                  </div>
                </div>
              </li>
              
              @endif


               @if($detail->cuti_status == 7)

              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Baru</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diajukan, menunggu verifikasi Kasubbag Keportala</p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Kasubbag Keportala</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi Atasan </p>
                  </div>
                </div>
              </li>

                <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Ditangguhkan</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} ditangguhkan dengan alasan <b>{{$detail->alasan_tolak}}</b></p>
                  </div>
                </div>
              </li>


              
              @endif


              @if($detail->cuti_status == 8)

              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Baru</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} telah diajukan, menunggu verifikasi Kasubbag Keportala </p>
                  </div>
                </div>
              </li>


              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Diterima Oleh Kasubbag Keportala</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Menunggu verifikasi Atasan </p>
                  </div>
                </div>
              </li>

                <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} Mengalami Perubahan</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Pengajuan {{ucwords($detail->jeniscuti->nama_cuti)}} mengalami Perubahan dengan alasan <b>{{$detail->alasan_tolak}}</b></p>
                  </div>
                </div>
              </li>


              
              @endif

              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

</div>

@endsection