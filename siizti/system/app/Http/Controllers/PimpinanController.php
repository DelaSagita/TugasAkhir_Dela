<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Cuti;
use App\Models\CutiDetail;
use App\Models\Bidang;
use App\Models\PengaturanCuti;
use App\Models\KeluarKantor;
use App\Models\TidakMasuk;
use Auth;
use DB;

class PimpinanController extends Controller
{

    function beranda(){
      $author = Auth::user();
       $bulanSekarang = date('m');

        $data['totalcutibulan'] = Cuti::whereMonth('tgl_mulai_cuti',$bulanSekarang)
        ->where('flag_erase',1)->count();

        $data['totalcuti'] = Cuti::where('flag_erase',1)
        ->where('cuti_status',4)
        ->count();
        $data['list_cuti'] = Cuti::where('cuti_status',4)->where('flag_erase',1)->get();

        $data['list_keluar'] = KeluarKantor::where('status',0)
        ->where('id_pimpinan_bidang', Auth::user()->pegawai_id)
        ->where('flag_erase',1)
        ->get();

        $data['keluarkantor'] = KeluarKantor::where('id_pimpinan_bidang', Auth::user()->pegawai_id)
        ->whereMonth('created_at',$bulanSekarang)
        ->count();

         $data['list_tidakmasuk'] = TidakMasuk::whereMonth('created_at',$bulanSekarang)
        ->get();

         $data['tidakmasuk'] = TidakMasuk::whereMonth('created_at',$bulanSekarang)
        ->count();

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

       // CUTI SAKIT
    $get_cuti_sakit = CutiDetail::where('pengaturan_cuti_id', 6)
    ->where('pegawai_id_cuti', Auth::user()->pegawai_id)
    ->whereYear('created_at',date('Y'))
    ->where('status_cuti',1)
    ->count();
    
    $jumlah_cuti_sakit = PengaturanCuti::where('pengaturan_cuti_id',6)->first();
    $data['jumlah_cuti_aktif'] = $jumlah_cuti_sakit->jumlah_hari - $get_cuti_sakit;
    

  $data['hasil_sisa_cuti_tahunan'] = $sisa_now + $sisa_1 + $sisa_2;
        return view('pimpinan.beranda',$data);
    }

}
