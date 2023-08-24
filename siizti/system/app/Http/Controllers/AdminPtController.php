<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;
use App\Models\Pt;
use DB;

class AdminPtController extends Controller
{
    function index(){
        $data['detail'] = Pegawai::where('pegawai_level',1)->where('flag_erase',1)->first();
        $data['list_pegawai'] = Pegawai::where('pegawai_status','PEGAWAI AKTIF')->where('flag_erase',1)->get();
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();

        $data['pt'] = DB::table('pengaturan_ttd')->first();
        return view('admin.pt.index',$data);
    }

    function update(Pt $pt){
       $pt->pt_nama = request('pt_nama');
       $pt->pt_nip = request('pt_nip');
       $pt->save();

        return back()->with('success','Pimpinan PT berhasil diperbaharui');
    }


   
}




















