<?php

namespace App\Http\Controllers;
use App\Models\Bidang;
use App\Models\Pegawai;
use App\Models\PengaturanCuti;
use Illuminate\Http\Request;

class OperatorPengaturancutiController extends Controller
{
    function index(){
        $data['list_cuti'] = PengaturanCuti::where('flag_erase',1)->get();
        return view('operator.pengaturan-cuti.index',$data);
    }

}
