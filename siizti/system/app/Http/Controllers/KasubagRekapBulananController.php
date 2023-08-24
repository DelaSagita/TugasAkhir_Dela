<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\CutiDetail;
use App\Models\Pegawai;
use Carbon\Carbon;
use Auth;

class KasubagRekapBulananController extends Controller
{
    function index(Request $request){
     $tahun_link = $data['tahun_link'] = $request->tahun;
     $bulan_link = $data['bulan_link'] = $request->bulan;
     $data['bulan'] = Carbon::parse('23-' . date('m') . '-2022')->isoFormat(' MMMM ');
     $data['bulan_saatini'] = date('m');
     $data['bulan_sekarang'] = $bulan_sekarang = date('n');
     $data['tanggal_sekarang'] =  date('Y-m-d');


     $bulanSekarang = date('m');
     $data['totalcutibulan'] = Cuti::whereMonth('tgl_mulai_cuti',$bulan_link)->where('flag_erase',1)->count();
     $data['totalcuti'] = Cuti::where('flag_erase',1)->count();
     $data['list_cuti'] = Cuti::where('cuti_status',0)->where('flag_erase',1)->get();



     $data['list_pegawai'] = Pegawai::where('flag_erase',1)->where('pegawai_status','PEGAWAI AKTIF')->get();


     return view('kasubag.rekap-bulanan.index',$data);
 }

 function cetak(Request $request){
     $tahun_link = $data['tahun_link'] = $request->tahun;
     $bulan_link = $data['bulan_link'] = $request->bulan;
    $bulanSekarang = date('m');
    $data['totalcutibulan'] = Cuti::whereMonth('tgl_mulai_cuti',$bulanSekarang)->where('flag_erase',1)->count();
    $data['totalcuti'] = Cuti::where('flag_erase',1)->count();
    $data['list_cuti'] = Cuti::where('cuti_status',0)->where('flag_erase',1)->get();



    $data['list_pegawai'] = Pegawai::where('flag_erase',1)->where('pegawai_status','PEGAWAI AKTIF')->get();

    return view('kasubag.rekap-bulanan.cetak',$data);
}
}
