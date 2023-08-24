<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\CutiDetail;
use App\Models\TidakMasuk;
use App\Models\KeluarKantor;
use App\Models\PengaturanCuti;

use Auth;
use Carbon\Carbon;

class PegawaiController extends Controller
{
  function beranda(){
    $author = Auth::user();
    $bulanSekarang = date('m');
    $data['totalcutibulan'] = Cuti::whereMonth('tgl_mulai_cuti',$bulanSekarang)->where('flag_erase',1)->count();

    // proses pengecekan sisa cuti


    
// ============= CUTI TAHUNAN ===============================
    $tahun_1 = date('Y') - 1;
    $tahun_2 = date('Y') - 2;

    $cek_tahun_1 =  CutiDetail::where('tahun_cuti',$tahun_1)
    ->where('status_cuti',1)
    ->where('pengaturan_cuti_id',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
    ->count();

    
    $cek_tahun_2 =  CutiDetail::where('tahun_cuti',$tahun_2)
    ->where('status_cuti',1)
    ->where('pengaturan_cuti_id',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
    ->count();

    $cek_tahun_sekarang = CutiDetail::where('tahun_cuti',date('Y'))
    ->where('status_cuti',1)
    ->where('pengaturan_cuti_id',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
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

  $data['hasil_sisa_cuti_tahunan'] = $sisa_now + $sisa_1 + $sisa_2;
// =============  END CUTI TAHUNAN ===============================








    $tmt_tahun = date('Y',strtotime(Auth::user()->pegawai_tmt)) + 1;
    $jumlah = date('Y') - $tmt_tahun;
    
       // pake della
    $hasil = $jumlah % 3;
    $tahun_hitung = date('Y') - $hasil;

       // pake perbub

    





    $n1 = $data['total_cuti_tahunan'] = CutiDetail::where('tahun_cuti','>=',$tahun_hitung)
    ->where('status_cuti',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
    ->count();


    $data['sisa_cuti_tahunan'] = 36 - $n1;

    
    $data['list_cuti'] = Cuti::all();
    $data['total_cuti_baru'] = Cuti::where('cuti_status',0)->count();

    $data['list_tidakmasuk'] = TidakMasuk::where('status',0)
    ->where('flag_erase',1)
    ->where('id_pimpinan_pn', Auth::user()->pegawai_id)
    ->get();

    $data['list_keluar_kantor'] = KeluarKantor::where('status',0)
    ->where('flag_erase',1)
    ->where('id_pimpinan_bidang', Auth::user()->pegawai_id)
    ->get();

    $data['count_keluar_kantor'] = KeluarKantor::where('flag_erase',1)
    ->whereMonth('created_at',date('m'))
    ->where('id_pimpinan_bidang', Auth::user()->pegawai_id)
    ->count();

    $data['count_keluar_kantor_baru'] = KeluarKantor::where('flag_erase',1)
    ->where('status',0)
    ->where('id_pimpinan_bidang', Auth::user()->pegawai_id)
    ->count();

    // CUTI SAKIT
    $get_cuti_sakit = CutiDetail::where('pengaturan_cuti_id', 6)
    ->where('pegawai_id_cuti', Auth::user()->pegawai_id)
    ->whereYear('created_at',date('Y'))
    ->where('status_cuti',1)
    ->count();


    $jumlah_cuti_sakit = PengaturanCuti::where('pengaturan_cuti_id',6)->first();
    $data['jumlah_cuti_aktif'] = $jumlah_cuti_sakit->jumlah_hari - $get_cuti_sakit;


    // COUNT SISA CUTI
    $data['alasan_penting'] = CutiDetail::where('pengaturan_cuti_id',5)
    ->where('tahun_cuti',date('Y'))
    ->where('pegawai_id_cuti', Auth::user()->pegawai_id)
    ->count();

    $data['cuti_besar'] = CutiDetail::where('pengaturan_cuti_id',2)
    ->where('tahun_cuti',date('Y'))
    ->where('pegawai_id_cuti', Auth::user()->pegawai_id)
    ->count();

      $data['cuti_sakit'] = CutiDetail::where('pengaturan_cuti_id',6)
    ->where('tahun_cuti',date('Y'))
    ->where('pegawai_id_cuti', Auth::user()->pegawai_id)
    ->count();

     $data['cuti_negara'] = CutiDetail::where('pengaturan_cuti_id',4)
    ->where('tahun_cuti',date('Y'))
    ->where('pegawai_id_cuti', Auth::user()->pegawai_id)
    ->count();
    

    return view('pegawai.beranda',$data);
  }
}
