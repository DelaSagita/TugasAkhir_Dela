<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Cuti;
use App\Models\CutiDetail;
use App\Models\Bidang;
use Auth;
use DB;

class AdminController extends Controller
{

    function beranda(){
        $author = Auth::user();
    $bulanSekarang = date('m');
    $data['totalcutibulan'] = Cuti::whereMonth('tgl_mulai_cuti',$bulanSekarang)->where('flag_erase',1)->count();


    $tmt_tahun = date('Y',strtotime(Auth::user()->pegawai_tmt)) + 1;
    $jumlah = date('Y') - $tmt_tahun;
    
       // pake della
    $hasil = $jumlah % 3;
    $tahun_hitung = date('Y') - $hasil;

       // pake perbub

    $tahun_1 = date('Y') - 1;
    $cek_tahun_1 =  CutiDetail::where('tahun_cuti',$tahun_1)
    ->where('status_cuti',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
    ->count();

    $tahun_2 = date('Y') - 2;
    $cek_tahun_2 =  CutiDetail::where('tahun_cuti',$tahun_2)
    ->where('status_cuti',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
    ->count();

    $cek_tahun_sekarang = CutiDetail::where('tahun_cuti',date('Y'))
    ->where('status_cuti',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
    ->count();

    if($cek_tahun_2 == 0 AND $cek_tahun_1 == 0){
      $data['jumlah_cuti_aktif'] = 24;
    }elseif($cek_tahun_2 > 0 AND $cek_tahun_1 == 0){
      $data['jumlah_cuti_aktif'] = 18;
    }elseif($cek_tahun_2 > 0 AND $cek_tahun_1 > 0){
      $data['jumlah_cuti_aktif'] = 24;
    }
        return view('admin.beranda',$data);
    }

    function indexPegawai(){
        $data['jumlah_pegawai'] = Pegawai::where('flag_erase',1)->count();
        $data['list_pegawai'] = Pegawai::where('flag_erase',1)->get();
        return view('admin/pegawai/index',$data);
    }

    function createPegawai(){
        return view('admin.pegawai.create');
    }

    function indexBidang(){
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        return view('admin.pengaturan-bidang.index',$data);
    }

    function storeBidang(){
        $admin = Pegawai::where('pegawai_level',0)->first();
        $bidang = new Bidang;
        $bidang->bidang_nama = request('bidang_nama');
        $bidang->bidang_pimpinan_id = $admin->pegawai_id;
        $bidang->save();
        return back()->with('success','Bidang berhasil dibuat');
    }

    function indexPimpinan(){
        $data['detail'] = Pegawai::where('pegawai_pimpinan',1)
        ->where('flag_erase',1)
        ->first();
        
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        $data['list_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_pimpinan','!=',1)
        ->where('pegawai_status','PEGAWAI AKTIF')
        ->get();
        return view('admin.pengaturan-pimpinan.index',$data);
    }

    function updatePimpinan(){
        $pimpinan_lama = request('pimpinan_lama');
        $pimpinan_baru = request('pimpinan_baru');
        
        $update_lama = DB::table('pegawai')->where('pegawai_id',$pimpinan_lama)->update([
            'pegawai_pimpinan' => 0
        ]);

        $update_baru = DB::table('pegawai')->where('pegawai_id',$pimpinan_baru)->update([
            'pegawai_pimpinan' => 1
        ]);

        return back()->with('success','Pimpinan PN telah diganti');
    }


     function indexKasubag(){
        $data['detail'] = Pegawai::where('pegawai_pimpinan',3)
        ->where('flag_erase',1)
        ->first();
        
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();

        $data['list_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_pimpinan','!=',3)
        ->where('pegawai_pimpinan','!=',1)
        ->where('pegawai_status','PEGAWAI AKTIF')
        ->get();

        return view('admin.pengaturan-kasubag.index',$data);
    }

    function updateKasubag(){
        $kasubag_lama = request('kasubag_lama');
        $kasubag_baru = request('kasubag_baru');
        
        $update_lama = DB::table('pegawai')->where('pegawai_id',$kasubag_lama)->update([
            'pegawai_pimpinan' => 0
        ]);

        $update_baru = DB::table('pegawai')->where('pegawai_id',$kasubag_baru)->update([
            'pegawai_pimpinan' => 3
        ]);

        return back()->with('success','Kasubbag Keportala telah diganti');
    }
}
