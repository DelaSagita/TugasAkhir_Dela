<!DOCTYPE html>
<html>
<head>
    <title>FORMAT SURAT</title>
     <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('public')}}/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{url('public')}}/admin/assets/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('public') }}/customstyle/custom.css">
</head>
<body>


   <table class="custom-table table-bordered">

                        <thead>
                            <tr>
                                <h2 class="table-title">Rekapitulasi Izin dan Cuti Pegawai Bulan Juni 2023</h2>
                            </tr>
                            <tr>
                                <td class="text-center" rowspan="2">No.</td>
                                <td class="text-center" rowspan="2">Nama</td>
                                <td class="text-center" rowspan="2">NIP</td>
                                <td class="text-center" rowspan="2">Jabatan</td>
                                <td class="text-center" colspan="10">Mengajukan Cuti</td>
                                <td class="text-center" rowspan="2">Sisa Cuti Tahunan</td>
                            </tr>
                            <tr>
                                <td class="text-center">ct</td>
                                <td class="text-center">cb</td>
                                <td class="text-center">cs</td>
                                <td class="text-center">cs1</td>
                                <td class="text-center">cm</td>
                                <td class="text-center">cap</td>
                                <td class="text-center">cap1</td>
                                <td class="text-center">clt</td>
                                <td class="text-center">ik</td>
                                <td class="text-center">tmk</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_pegawai as $p)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="">{{ucwords($p->pegawai_nama)}}</td>
                                <td class="text-center">{{$p->pegawai_nip}}</td>
                                <td class="text-center">{{ucwords($p->pegawai_jabatan)}}</td>
                                <td class="text-center">
                                    <!-- CUTI TAHUNAN -->
                                    @php

                                    $cb = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('status_cuti',1)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('tahun_cuti', $tahun_link)
                                    ->whereMonth('tgl_cuti_full', $bulan_link)
                                    ->count();

                                    @endphp

                                    {{$cb}}
                                </td>
                                <td class="text-center">
                                    <!-- CUTI BESAR -->
                                    @php

                                    $ct = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('status_cuti',2)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('tahun_cuti', $tahun_link)
                                    ->whereMonth('tgl_cuti_full', $bulan_link)
                                    ->count();

                                    @endphp

                                    {{$ct}}
                                </td>
                                <td class="text-center">
                                    <!-- CUTI SAKIT -->
                                    @php

                                    $cs = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('status_cuti',6)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('tahun_cuti', $tahun_link)
                                    ->whereMonth('tgl_cuti_full', $bulan_link)
                                    ->count();

                                    @endphp
                                    @if($cs > 14)
                                    0
                                    @else
                                    {{$cs}}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @php

                                    $cs1 = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('status_cuti',6)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('tahun_cuti', $tahun_link)
                                    ->whereMonth('tgl_cuti_full', $bulan_link)
                                    ->count();

                                    @endphp
                                    @if($cs1 > 14)
                                    {{$cs1}}
                                    @else
                                    0
                                    @endif
                                </td>
                                <td class="text-center">
                                    @php

                                    $cm = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('status_cuti',3)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('tahun_cuti', $tahun_link)
                                    ->whereMonth('tgl_cuti_full', $bulan_link)
                                    ->count();

                                    @endphp
                                    {{$cm}}
                                </td>
                                <td class="text-center">
                                    <!-- CAP -->
                                    @php

                                    $cap = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('status_cuti',5)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('tahun_cuti', $tahun_link)
                                    ->whereMonth('tgl_cuti_full', $bulan_link)
                                    ->count();

                                    @endphp
                                    @if($cap > 10)
                                    0
                                    @else
                                    {{$cap}}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- CAP -->
                                    @php

                                    $cap1 = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('status_cuti',5)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('tahun_cuti', $tahun_link)
                                    ->whereMonth('tgl_cuti_full', $bulan_link)
                                    ->count();

                                    @endphp
                                    @if($cap1 > 10)
                                    {{$cap1}}
                                    @else
                                    0
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- CLT -->
                                    @php

                                    $clt = App\Models\CutiDetail::where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('status_cuti',4)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->where('tahun_cuti', $tahun_link)
                                    ->whereMonth('tgl_cuti_full', $bulan_link)
                                    ->count();

                                    @endphp
                                    {{$clt}}
                                </td>
                                <td class="text-center">
                                    @php

                                    $ik = App\Models\KeluarKantor::where('pegawai_id', $p->pegawai_id)
                                    ->where('status',1)
                                    ->whereYear('tgl_izin', $tahun_link)
                                    ->whereMonth('tgl_izin', $bulan_link)
                                    ->count();

                                    @endphp
                                    {{$ik}}
                                </td>
                                <td class="text-center">
                                    @php

                                    $tmk = App\Models\TidakMasuk::where('id_pegawai_izin', $p->pegawai_id)
                                    ->where('status',2)
                                    ->whereYear('tgl_mulai_izin', $tahun_link)
                                    ->whereMonth('tgl_mulai_izin', $bulan_link)
                                    ->count();

                                    @endphp
                                    {{$tmk}}

                                </td>
                                <td class="text-center">
                                    @php
                                    $tahun_1 = date('Y') - 1;
                                    $tahun_2 = date('Y') - 2;

                                    $cek_tahun_1 =  App\Models\CutiDetail::where('tahun_cuti',$tahun_1)
                                    ->where('status_cuti',1)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->count();


                                    $cek_tahun_2 =  App\Models\CutiDetail::where('tahun_cuti',$tahun_2)
                                    ->where('status_cuti',1)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->count();

                                    $cek_tahun_sekarang = App\Models\CutiDetail::where('tahun_cuti',date('Y'))
                                    ->where('status_cuti',1)
                                    ->where('pengaturan_cuti_id',1)
                                    ->where('pegawai_id_cuti', $p->pegawai_id)
                                    ->count();

                                    $cek_now = $cek_tahun_sekarang;
                                    $sisa_now = 12 - $cek_now;

                                    $cek_1 = $cek_tahun_1;
                                    $sisa_1 = 0;
                                    if($cek_1 < 7){
                                        $sisa_1 = 6;
                                    }elseif($cek_1 > 6){
                                        $sisa_1 = 12 - $cek_1;
                                    }

                                    $cek_2 = $cek_tahun_2;
                                    $sisa_2 = 0;
                                    if($cek_2 < 7){
                                        $sisa_2 = 6;
                                    }elseif($cek_2 > 6){
                                        $sisa_2 = 12 - $cek_2;
                                    }

                                    $hasil = $sisa_now + $sisa_1 + $sisa_2;
                                    @endphp

                                    {{$hasil}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>



                    </table>    

    <ul class="list-table mt-3">
        <li class="list-table-header">Keterangan</li>
        <li class="list-table-item">
            <span class="title">ct</span>
            <span class="dots">:</span>
            <span class="subtitle">Cuti Tahunan</span>
        </li>
        <li class="list-table-item">
            <span class="title">cb</span>
            <span class="dots">:</span>
            <span class="subtitle">Cuti Besar</span>
        </li>
        <li class="list-table-item">
            <span class="title">cs</span>
            <span class="dots">:</span>
            <span class="subtitle">Cuti Sakit 1 s.d 14 hari</span>
        </li> 
        <li class="list-table-item">
            <span class="title">cs1</span>
            <span class="dots">:</span>
            <span class="subtitle">Cuti Sakit > 14 hari</span>
        </li>
        <li class="list-table-item">
            <span class="title">cm</span>
            <span class="dots">:</span>
            <span class="subtitle">Cuti Melahirkan</span>
        </li>
    </ul>


<script>
        setTimeout(function () { window.print(); }, 500);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
    </script>
</body>
</html>