<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Cuti;
use App\Models\CutiDetail;
use App\Models\Bidang;
use App\Models\PengaturanCuti;
use App\Models\KeluarKantor;
use App\Models\TidakMasuk;
use App\Models\KalenderLibur;
use Auth;
use DB;

class PimpinanPermohonanmasukController extends Controller
{

    function indexCuti(){

       $data['bulan_ini'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',4)
       ->whereMonth('tgl_mulai_cuti', date('m'))
       ->where('pimpinan_id',Auth::user()->pegawai_id)
       ->count();

       $data['hari_ini'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',4)
       ->whereDay('created_at', date('d'))
       ->where('pimpinan_id',Auth::user()->pegawai_id)
       ->count();

       $data['permintaan_baru'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',4)
       ->where('pimpinan_id',Auth::user()->pegawai_id)
       ->count();


        $author = Auth::user();
        $kalender_libur = KalenderLibur::where('flag_erase',1)->get();
        $cuti_detail = CutiDetail::all();

         // cek hari sabtu - minggu
        CutiDetail::whereIn('hari_cuti',['Sabtu','Minggu'])->update([
            'status_cuti' => 0
        ]);

        // cek kalender libur
        foreach($kalender_libur as $k){
            $p[] = CutiDetail::where('tgl_cuti_full',$k->tgl)->update([
                'status_cuti' => 0
            ]);
        }

        $data['list_cuti'] = Cuti::where('pimpinan_id', $author->pegawai_id)
        ->where('cuti_status', 4)
        ->where('flag_erase',1)
        ->get();   

        $bulanSekarang = date('m');

         $data['tidakmasuk'] = TidakMasuk::whereMonth('created_at',$bulanSekarang)
        ->count();

         $data['cuti'] = Cuti::whereMonth('created_at',$bulanSekarang)
        ->count();

          $data['keluarkantor'] = KeluarKantor::whereMonth('created_at',$bulanSekarang)
        ->count();


        return view('pimpinan.permohonan-masuk.cuti.index',$data);
    }

     function validasi(){

        $data['bulan_ini'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',4)
       ->whereMonth('tgl_mulai_cuti', date('m'))
       ->where('pimpinan_id',Auth::user()->pegawai_id)
       ->count();

       $data['hari_ini'] = Cuti::where('flag_erase',1)
       ->where('cuti_status', 4)
       ->whereDay('created_at', date('d'))
       ->where('pimpinan_id',Auth::user()->pegawai_id)
       ->count();

       $data['permintaan_baru'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',4)
       ->where('pimpinan_id',Auth::user()->pegawai_id)
       ->count();


        $author = Auth::user();
        $kalender_libur = KalenderLibur::where('flag_erase',1)->get();
        $cuti_detail = CutiDetail::all();

         // cek hari sabtu - minggu
        CutiDetail::whereIn('hari_cuti',['Sabtu','Minggu'])->update([
            'status_cuti' => 0
        ]);

        // cek kalender libur
        foreach($kalender_libur as $k){
            $p[] = CutiDetail::where('tgl_cuti_full',$k->tgl)->update([
                'status_cuti' => 0
            ]);
        }

        $data['list_cuti'] = Cuti::where('pimpinan_id', $author->pegawai_id)
        ->where('cuti_status', 6)
        ->where('flag_erase',1)
        ->get();   

        $bulanSekarang = date('m');

         $data['tidakmasuk'] = TidakMasuk::whereMonth('created_at',$bulanSekarang)
        ->count();

         $data['cuti'] = Cuti::whereMonth('created_at',$bulanSekarang)
        ->count();

          $data['keluarkantor'] = KeluarKantor::whereMonth('created_at',$bulanSekarang)
        ->count();


        return view('pimpinan.permohonan-masuk.cuti.index',$data);
    }


     function tolak(){

       $data['bulan_ini'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',4)
       ->whereMonth('tgl_mulai_cuti', date('m'))
       ->where('pimpinan_id',Auth::user()->pegawai_id)
       ->count();

       $data['hari_ini'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',4)
       ->whereDay('created_at', date('d'))
       ->where('pimpinan_id',Auth::user()->pegawai_id)
       ->count();

       $data['permintaan_baru'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',4)
       ->where('pimpinan_id',Auth::user()->pegawai_id)
       ->count();


        $author = Auth::user();
        $kalender_libur = KalenderLibur::where('flag_erase',1)->get();
        $cuti_detail = CutiDetail::all();

         // cek hari sabtu - minggu
        CutiDetail::whereIn('hari_cuti',['Sabtu','Minggu'])->update([
            'status_cuti' => 0
        ]);

        // cek kalender libur
        foreach($kalender_libur as $k){
            $p[] = CutiDetail::where('tgl_cuti_full',$k->tgl)->update([
                'status_cuti' => 0
            ]);
        }

        $data['list_cuti'] = Cuti::where('pimpinan_id', $author->pegawai_id)
        ->whereIn('cuti_status', [1,3,5,7,8])
        ->where('flag_erase',1)
        ->get();   

        $bulanSekarang = date('m');

         $data['tidakmasuk'] = TidakMasuk::whereMonth('created_at',$bulanSekarang)
        ->count();

         $data['cuti'] = Cuti::whereMonth('created_at',$bulanSekarang)
        ->count();

          $data['keluarkantor'] = KeluarKantor::whereMonth('created_at',$bulanSekarang)
        ->count();


        return view('pimpinan.permohonan-masuk.cuti.index',$data);
    }

    function showCuti(Cuti $cuti){
        $data['detail'] = $cuti;
        $data['list_detail'] = CutiDetail::where('id_cuti', $cuti->cuti_id)->get();
        return view('pimpinan.permohonan-masuk.cuti.show',$data);
    }

    function terimaPimpinan(Cuti $cuti){
        $cuti->cuti_status = 6;
        $cuti->save();
        return back()->with('success','Cuti telah diterima, menunggu verifikasi Atasan');
    }

    function tolakPimpinan(Cuti $cuti){
        $cuti->cuti_status = 5;
        $cuti->alasan_tolak = request('alasan_tolak');
        $cuti->save();
        return back()->with('danger','Cuti telah ditolak, menunggu verifikasi Atasan');
    }

function tangguhkanPimpinan(Cuti $cuti){
        $cuti->cuti_status = 7;
        $cuti->alasan_tolak = request('alasan_tolak');
        $cuti->save();
        return back()->with('warning','Cuti telah ditangguhkan');
    }

    function perubahanPimpinan(Cuti $cuti){
        $cuti->cuti_status = 8;
        $cuti->alasan_tolak = request('alasan_tolak');
        $cuti->save();
        return back()->with('warning','Cuti telah ditangguhkan');
    }



    // ++++++++++++++++++++++++++++

  function indexKeluarkantor(){
     $author = Auth::user();
    $data['list_data'] = KeluarKantor::where('id_pimpinan_bidang', $author->pegawai_id)->get();

    $data['bulan_ini'] = KeluarKantor::where('flag_erase',1)
    ->where('status','!=',0)
    ->where('id_pimpinan_bidang', Auth::user()->pegawai_id)
    ->whereMonth('tgl_izin', date('m'))
    ->count();

    $data['hari_ini'] = KeluarKantor::where('flag_erase',1)
    ->where('id_pimpinan_bidang', Auth::user()->pegawai_id)
    ->whereDay('tgl_izin', date('d'))
    ->count();

    $data['permintaan_baru'] = KeluarKantor::where('flag_erase',1)
    ->where('status',0)
    ->where('id_pimpinan_bidang', Auth::user()->pegawai_id)
    ->count();


     $bulanSekarang = date('m');

         $data['tidakmasuk'] = TidakMasuk::whereMonth('created_at',$bulanSekarang)
        ->count();

         $data['cuti'] = Cuti::whereMonth('created_at',$bulanSekarang)
        ->count();

          $data['keluarkantor'] = KeluarKantor::whereMonth('created_at',$bulanSekarang)
        ->count();
   return view('pimpinan.permohonan-masuk.keluar-kantor.index',$data);

 }

 function showKeluarKantor(KeluarKantor $id){
  $data['detail'] = $id;
  return view('pimpinan.permohonan-masuk.keluar-kantor.show',$data);
 }



function tolakKeluarkantor(KeluarKantor $id){
    $id->alasan_tolak = request('alasan_tolak');
    $id->status = 2;
    $id->save();

    return back()->with('danger','Keluar kantor telah ditolak');

}

function terimaKeluarkantor(KeluarKantor $id){
 DB::table('keluar_kantor')->where('keluar_kantor_id', $id->keluar_kantor_id)
 ->update([
    'status' => 1
]);

 return back()->with('success','Keluar kantor telah disetujui');

}


function cetakKeluarkantor(KeluarKantor $id){
    $data['detail'] = $id;
    return view('pegawai.permohonan.keluar-kantor.cetak',$data);

}


function indexTidakmasuk(){
    $data['list_tidakmasuk'] = TidakMasuk::where('id_pimpinan_pn', Auth::user()->pegawai_id)
    ->where('flag_erase',1)
    ->get();

     $bulanSekarang = date('m');

         $data['tidakmasuk'] = TidakMasuk::whereMonth('created_at',$bulanSekarang)
        ->count();

         $data['cuti'] = Cuti::whereMonth('created_at',$bulanSekarang)
        ->count();

          $data['keluarkantor'] = KeluarKantor::whereMonth('created_at',$bulanSekarang)
        ->count();

     return view('pimpinan.permohonan-masuk.tidak-masuk.index',$data);
}

function showTidakMasuk(TidakMasuk $tidakmasuk){
        $data['detail'] = $tidakmasuk;
        return view('pimpinan.permohonan-masuk.tidak-masuk.show',$data);
    }

    function tolakTidakMasuk(TidakMasuk $tidakmasuk){
        $tidakmasuk->alasan_tolak = request('alasan_tolak');
        $tidakmasuk->status = 1;
        $tidakmasuk->save();

        return back()->with('danger','Keluar kantor telah ditolak');

    }

    function terimaTidakMasuk(TidakMasuk $tidakmasuk){
     DB::table('tidak_masuk')->where('td_masuk_id', $tidakmasuk->td_masuk_id)
     ->update([
        'status' => 2
    ]);
     return back()->with('success','Pengajuan tidak masuk telah diterima');
 }

}
