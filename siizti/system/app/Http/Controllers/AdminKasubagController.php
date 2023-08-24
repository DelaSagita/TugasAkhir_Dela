<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;
use DB;

class AdminKasubagController extends Controller
{
    function index(){
     $data['detail'] = Pegawai::where('pegawai_level',3)->where('pegawai_status','PEGAWAI AKTIF')->where('flag_erase',1)->first();
      $data['list_pegawai'] = Pegawai::where('pegawai_status','PEGAWAI AKTIF')->where('flag_erase',1)->get();
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        return view('admin.kasubag.index',$data);
    }


     function update(){
        $id_lama = request('kasubag_lama');
        DB::table('pegawai')->where('pegawai_id',$id_lama)->update([
            "pegawai_level" => 4,
            "pegawai_pimpinan"=>0
        ]);

        $id_baru = request('kasubag_baru');
        DB::table('pegawai')->where('pegawai_id',$id_baru)->update([
            "pegawai_level" => 3,
            "pegawai_pimpinan"=>1
        ]);

        return back()->with('success','Kasubbag Keportala berhasil diperbaharui');
    }


   
}




















