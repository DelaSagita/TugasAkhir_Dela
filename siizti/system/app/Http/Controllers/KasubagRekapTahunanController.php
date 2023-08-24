<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\CutiDetail;
use App\Models\Pegawai;
use Auth;

class KasubagRekapTahunanController extends Controller
{
    function index(){
        $bulanSekarang = date('m');
        $data['totalcutibulan'] = Cuti::whereMonth('tgl_mulai_cuti',$bulanSekarang)->where('flag_erase',1)->count();
        $data['totalcuti'] = Cuti::where('flag_erase',1)->count();
        $data['list_cuti'] = Cuti::where('cuti_status',0)->where('flag_erase',1)->get();



        $data['list_pegawai'] = Pegawai::where('flag_erase',1)->where('pegawai_status','PEGAWAI AKTIF')->get();

        return view('kasubag.rekap-tahunan.index',$data);
    }

    function cetak(){
        $bulanSekarang = date('m');
        $data['totalcutibulan'] = Cuti::whereMonth('tgl_mulai_cuti',$bulanSekarang)->where('flag_erase',1)->count();
        $data['totalcuti'] = Cuti::where('flag_erase',1)->count();
        $data['list_cuti'] = Cuti::where('cuti_status',0)->where('flag_erase',1)->get();



        $data['list_pegawai'] = Pegawai::where('flag_erase',1)->where('pegawai_status','PEGAWAI AKTIF')->get();

        return view('kasubag.rekap-tahunan.cetak',$data);
    }
}
