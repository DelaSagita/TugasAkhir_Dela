@extends('template.base')
@section('title')
DETAIL IZIN
@endsection

@section('content')

<div class="container mt-3">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
        <b>Yang Meminta Izin</b>
        <table class="table table-borderless">
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
            <th>Untuk Keluar Kantor Pada</th>
            <td>: {{Carbon\Carbon::parse($detail->tgl_izin)->isoFormat('dddd')}},   {{Carbon\Carbon::parse($detail->tgl_izin)->Format('d M Y')}} <br>
                &nbsp; Pukul {{$detail->jam_mulai}} s.d {{$detail->jam_mulai}}</td>
          </tr>

          <tr>
            <th>Dengan Alasan</th>
            <td>: {{ucwords($detail->alasan)}}</td>
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