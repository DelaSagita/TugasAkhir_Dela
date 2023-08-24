@extends('template.base')
@section('title')
DETAIL IZIN
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="row container">
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
                  <b style="font-size:14pt">PENGADILAN NEGERI KETAPANG KELAS II</b><br>
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
                <p style="align: justify;">
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

  </div>
</div>

@endsection