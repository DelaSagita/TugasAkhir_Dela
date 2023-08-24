<?php

namespace App\Http\Controllers;
use App\Models\Bidang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use DB;

class OperatorBidangController extends Controller
{
    function index(){
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();

        $data['list_pegawai'] = Pegawai::where('pegawai_status','PEGAWAI AKTIF')
        ->where('flag_erase',1)
        // ->where('pegawai_pimpinan', '!=',1)
        ->where('pegawai_pimpinan','!=',2)
        ->get();

        return view('operator.bidang.index',$data);
    }

    function create(){
        $data['list_pegawai'] = Pegawai::where('pegawai_status','PEGAWAI AKTIF')
        ->where('flag_erase',1)
        ->get();
        return view('operator.bidang.create',$data);
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
         ]);



        return redirect('o/bidang')->with('success','Data bidang berhasil dibuat');
    }
}
