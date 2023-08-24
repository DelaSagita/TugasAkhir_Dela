@extends('template.base')
@section('title')
DETAIL PERMOHONAN CUTI
@endsection

@section('content')

<div class="container mt-3">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
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
                    <form class="modal-content" action="{{url('p/permohonan-masuk/cutu',$detail->cuti_id)}}/tolak-kasubag" method="post">
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
                      <h5 class="modal-title" id="backDropModalTitle">Keterangan Perubagan</h5>
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
      <div class="col-md-4">
        <b>Foto Pegawai</b>
        <img src="{{url('system')}}/public/{{$detail->pegawai->foto}}" width="100%" alt="">
      </div>
    </div>
  </div>
</div>

</div>

@endsection