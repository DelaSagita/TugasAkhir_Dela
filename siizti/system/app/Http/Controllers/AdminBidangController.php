<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;
use DB;

class AdminBidangController extends Controller
{
    function index(){
      $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
      $data['list_pegawai'] = Pegawai::where('flag_erase',1)->where('pegawai_status','PEGAWAI AKTIF')->get();
      return view('admin.bidang.index',$data);
  }

  function store(){
    $bidang = new Bidang;
    $bidang->bidang_nama = request('bidang_nama');
    $bidang->bidang_pimpinan_id = request('bidang_pimpinan_id');
    $bidang->save();


    DB::table('pegawai')->where('pegawai_id', request('bidang_pimpinan_id'))
    ->where('pegawai_pimpinan','!=',1)
    ->update([
        'pegawai_pimpinan' => 2,
        'pegawai_bidang_id' => $bidang->bidang_id,
        'pegawai_level' => 2,
    ]);
    return back()->with('success','Bidang berhasil dibuat');
}

function update(Bidang $bidang){
   $bidang->bidang_nama = request('bidang_nama');
   $bidang->bidang_pimpinan_id = request('bidang_pimpinan_id');
   $bidang->save();

    DB::table('pegawai')->where('pegawai_id', request('bidang_pimpinan_id'))
    ->where('pegawai_pimpinan','!=',1)
    ->update([
        'pegawai_pimpinan' => 2,
        'pegawai_bidang_id' => $bidang->bidang_id,
        'pegawai_level' => 2,
    ]);

    return back()->with('success','Data bidang berhasil diupdate');
}

function destroy(Bidang $bidang){
    $bidang->flag_erase = 0;
    $bidang->save();
    return back()->with('danger','Data bidang berhasil dihapus');
}



}




















