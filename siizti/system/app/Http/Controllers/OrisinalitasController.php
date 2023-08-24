<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\KeluarKantor;
use App\Models\TidakMasuk;
use App\Models\Cuti;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrisinalitasController extends Controller{

    function tidakMasuk(TidakMasuk $tidakMasuk){
         $data['detail'] = $tidakMasuk;
        return view('template.orisinalitas.tidak-masuk',$data);
    }

    function keluarKantor(KeluarKantor $keluarkantor){
         $data['detail'] = $keluarkantor;
        return view('template.orisinalitas.keluar-kantor',$data);
    }

    function cuti(Cuti $cuti){
         $data['detail'] = $cuti;
        return view('template.orisinalitas.cuti',$data);
    }

}
