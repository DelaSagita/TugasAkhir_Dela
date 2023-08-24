<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;
use DB;

class AdminPimpinanController extends Controller
{
    function index(){
        $data['detail'] = Pegawai::where('pegawai_level',1)->where('flag_erase',1)->first();
        $data['list_pegawai'] = Pegawai::where('pegawai_status','PEGAWAI AKTIF')->where('flag_erase',1)->get();
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        return view('admin.pimpinan.index',$data);
    }

    function update(){
        $id_lama = request('pimpinan_lama');
        DB::table('pegawai')->where('pegawai_id',$id_lama)->update([
            "pegawai_level" => 4,
            "pegawai_pimpinan"=>0
        ]);

        $id_baru = request('pimpinan_baru');
        DB::table('pegawai')->where('pegawai_id',$id_baru)->update([
            "pegawai_level" => 1,
            "pegawai_pimpinan"=>1
        ]);

        return back()->with('success','Pimpinan berhasil diperbaharui');
    }


   
}




















