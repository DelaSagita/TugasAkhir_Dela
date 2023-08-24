<?php

namespace App\Http\Controllers;
use App\Models\Bidang;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class OperatorPimpinanController extends Controller
{
    function index(){
        $data['detail'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_status','PEGAWAI AKTIF')
        ->where('pegawai_pimpinan',1)
        ->first();
        return view('operator.pimpinan.index',$data);
    }
}
