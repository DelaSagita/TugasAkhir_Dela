@extends('template.base')
@section('title')
DETAIL IZIN TIDAK MASUK
@endsection

@section('content')

<!-- PIMPINAN PN -->
@if(Auth::user()->pegawai_pimpinan == 1)
<div class="container mt-3">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
          <b>Yang Meminta Izin</b>
          <table class="table table-borderless">
            <tr>
              <th width="300px">Nama</th>
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
              <th>Untuk Tidak Masuk Pada</th>
              <td>: {{Carbon\Carbon::parse($detail->tgl_mulai_izin)->Format('d M Y')}} s/d {{Carbon\Carbon::parse($detail->tgl_selesai_izin)->Format('d M Y')}}
              </tr>

              <tr>
                <th>Dengan Alasan</th>
                <td>: {{ucwords($detail->alasan_izin)}}</td>
              </tr>
              <tr>
                <th>Tindakan</th>
                <td>
                  
                  @if($detail->status == 0)

                  <!-- Modal Backdrop -->
                  <div class="mt-3">
                    <!-- Button trigger modal -->
                    <button
                    type="button"
                    class="btn btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#backDropModal"
                    >
                    <i class="fa fa-times"></i> Tolak
                  </button>


                  <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <form class="modal-content" action="{{url('p/permohonan-masuk/tidak-masuk',$detail->td_masuk_id)}}/tolak-pimpinan" method="post">
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

                  
                  <a href="{{url('p/permohonan-masuk/tidak-masuk',$detail->td_masuk_id)}}/terima" onclick="return confirm('Yakin Menerima Izin Ini?')" class="btn btn-success btn-block"><i class="fa fa-check"></i> Terima</a>
                  @elseif($detail->status == 1)
                  <button class="btn btn-danger btn-sm">
                    <i class="fa fa-times"></i> Izin Telah Ditolak
                  </button> <br>
                  <p>
                    <b>Alasan Penolakan :</b> {{$detail->alasan_tolak}}
                  </p>

                  @elseif($detail->status == 2)

                   <a href="{{url('p/permohonan-masuk/tidak-masuk',$detail->td_masuk_id)}}/terima-pimpinan" onclick="return confirm('Yakin Menerima Izin Ini?')" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Terima</a>
                 

                  <a href="{{url('p/permohonan-masuk/tidak-masuk',$detail->td_masuk_id)}}/cetak" target="_blank" class="btn btn-sm btn-dark mt-2"><i class="fa fa-download"></i> Download Surat Izin </a>

                  <a href="{{url('p/permohonan-masuk/tidak-masuk',$detail->td_masuk_id)}}/cetak-pegawai" target="_blank" class="btn btn-sm btn-dark mt-2"><i class="fa fa-download"></i> Permohonan Pegawai </a>
                  @endif




                  <!-- Modal -->
                  <div class="modal fade" id="backDropModalPimpinan" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <form class="modal-content" action="{{url('p/permohonan-masuk/tidak-masuk',$detail->td_masuk_id)}}/tolak-pimpinan" method="post">
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

<!-- END PIMPINAN PN -->
@else


  @endif

  @endsection