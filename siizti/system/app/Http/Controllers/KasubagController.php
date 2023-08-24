<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\KeluarKantor;
use App\Models\TidakMasuk;
use Auth;

class KasubagController extends Controller
{
    function beranda(){
        $bulanSekarang = date('m');

        $data['totalcutibulan'] = Cuti::whereMonth('tgl_mulai_cuti',$bulanSekarang)
        ->where('flag_erase',1)->count();

        $data['totalcuti'] = Cuti::where('flag_erase',1)
        ->where('cuti_status',0,)
        ->count();
        $data['list_cuti'] = Cuti::where('cuti_status',0)->where('flag_erase',1)->get();

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

        return view('kasubag.beranda',$data);
    }
}
