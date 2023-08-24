<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengaturanCuti;
use App\Models\KalenderLibur;
use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\Bidang;
use App\Models\CutiDetail;
use App\Models\TidakMasuk;
use App\Models\KeluarKantor;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class KasubagPermohonanmasukController extends Controller
{

    // ======= NOTE STATUS TIDAK MASUK KERJA ======
    // 0 = status baru dibuat
    // 1 = tolak kabid
    // 2 = terima kabid
    // ============================================

    // ======= NOTE STATUS PERMOHONAN CUTI ======
    // 0 = status baru dibuat
    // 1 = tolak KASUBAG
    // 2 = terima KASUBAG
    // 3 = tolak KABID
    // 4 = terima KABID
    // 5 = tolak pimpinan PN
    // 6 = terima pimpinan PN
    // 7 = perubahan
    // 8 = ditangguhkan
    // ============================================

    function indexCuti(){

       $data['bulan_ini'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',0,)
       ->whereMonth('tgl_mulai_cuti', date('m'))
       ->where('kasubag_id',Auth::user()->pegawai_id)
       ->count();

       $data['hari_ini'] = Cuti::where('flag_erase',1)
        ->where('cuti_status',0)
        ->whereDay('created_at', date('d'))
       ->where('kasubag_id',Auth::user()->pegawai_id)
       ->count();

       $data['permintaan_baru'] = Cuti::where('flag_erase',1)
       ->where('cuti_status',0)
       ->where('kasubag_id',Auth::user()->pegawai_id)
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

    $data['list_cuti'] = Cuti::where('kasubag_id', $author->pegawai_id)
    ->where('flag_erase',1)
    ->where('cuti_status',0)
    ->get();


    return view('kasubag.permohonan-masuk.cuti.index',$data);
}

function validasi(){
    $data['bulan_ini'] = Cuti::where('flag_erase',1)
    ->where('cuti_status',0)
    ->whereMonth('tgl_mulai_cuti', date('m'))
    ->where('kasubag_id',Auth::user()->pegawai_id)
    ->count();

    $data['hari_ini'] = Cuti::where('flag_erase',1)
    ->where('cuti_status',0)
    ->whereDay('created_at', date('d'))
    ->where('kasubag_id',Auth::user()->pegawai_id)
    ->count();
   
    $data['permintaan_baru'] = Cuti::where('flag_erase',1)
    ->where('cuti_status',0)
    ->where('kasubag_id',Auth::user()->pegawai_id)
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

    $data['list_cuti'] = Cuti::where('kasubag_id', $author->pegawai_id)
    ->where('flag_erase',1)
    ->where('cuti_status',[2,4,6])
    ->get();


    return view('kasubag.permohonan-masuk.cuti.index',$data);
}

function tolak(){
    $data['bulan_ini'] = Cuti::where('flag_erase',1)
    ->where('cuti_status',0)
    ->whereMonth('tgl_mulai_cuti', date('m'))
    ->where('kasubag_id',Auth::user()->pegawai_id)
    ->count();

    $data['hari_ini'] = Cuti::where('flag_erase',1)
    ->where('cuti_status',0)
    ->whereDay('created_at', date('d'))
    ->where('kasubag_id',Auth::user()->pegawai_id)
    ->count();
   
    $data['permintaan_baru'] = Cuti::where('flag_erase',1)
    ->where('cuti_status',0)
    ->where('kasubag_id',Auth::user()->pegawai_id)
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

    $data['list_cuti'] = Cuti::where('kasubag_id', $author->pegawai_id)
    ->where('flag_erase',1)
    ->whereIn('cuti_status',[1,3,5,])
    ->get();


    return view('kasubag.permohonan-masuk.cuti.index',$data);
}


function showCuti(Cuti $cuti){
    $data['detail'] = $cuti;
    $data['list_detail'] = CutiDetail::where('id_cuti', $cuti->cuti_id)->get();
    return view('kasubag.permohonan-masuk.cuti.show',$data);
}

function terimaKasubag(Cuti $cuti){

    $jenis = '';
    if($cuti->jenis_cuti_id == 1){
        $jenis = "Tahunan";
    }elseif($cuti->jenis_cuti_id == 2){
     $jenis = "Besar";
 }elseif($cuti->jenis_cuti_id == 3){
    $jenis = "Melahirkan";
}elseif($cuti->jenis_cuti_id == 4){
    $jenis = "Diluar Tanggungan Negara";
}elseif($cuti->jenis_cuti_id == 5){
    $jenis = "Karena Alasan Penting";
}elseif($cuti->jenis_cuti_id == 6){
    $jenis = "Sakit";
}

    $pegawai = Pegawai::where('pegawai_id', $cuti->cuti_pegawai_id)->first();

    $kasubag = Pegawai::where('pegawai_level',3)->where('flag_erase',1)->first();
    $pimpinan = Pegawai::where('pegawai_level',1)->where('flag_erase',1)->first();
    $pimpinan_bidang = Bidang::where('bidang_id',$pegawai->pegawai_bidang_id)->first();
    $kabid = Pegawai::where('pegawai_id',$pimpinan_bidang->bidang_pimpinan_id)->first();


    if($cuti->kabid_id == $cuti->pimpinan_id){
        $cuti->cuti_status = 4;
        $cuti->no_surat = request('nomorsurat');
        $cuti->save();
    }else{
       $cuti->cuti_status = 2;
       $cuti->no_surat = request('nomorsurat');
       $cuti->save(); 
   }






   $nomor = $kabid->notlp;
   $pesan = "Haii ".$kabid->pegawai_nama.", Pegawai atas nama ".$pegawai->pegawai_nama." mengajukan Cuti. silahkan cek aplikasi";

   $userkey = '4888efcfc685';
   $passkey = '467fd9ba6c1d7673de1cfc9b';
   $telepon = $nomor;
   $message = $pesan;
   $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
   $curlHandle = curl_init();
   curl_setopt($curlHandle, CURLOPT_URL, $url);
   curl_setopt($curlHandle, CURLOPT_HEADER, 0);
   curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
   curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
   curl_setopt($curlHandle, CURLOPT_POST, 1);
   curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
    'userkey' => $userkey,
    'passkey' => $passkey,
    'to' => $telepon,
    'message' => $message
));
   $results = json_decode(curl_exec($curlHandle), true);
   curl_close($curlHandle);

   $notif = "Cuti ".$jenis. " telah diterima, menunggu verifikasi Atasan";
   return back()->with('success',$notif);
}
function tolakKasubag(Cuti $cuti){




    $jenis = '';
    if($cuti->jenis_cuti_id == 1){
        $jenis = "Tahunan";
    }elseif($cuti->jenis_cuti_id == 2){
     $jenis = "Besar";
 }elseif($cuti->jenis_cuti_id == 3){
    $jenis = "Melahirkan";
}elseif($cuti->jenis_cuti_id == 4){
    $jenis = "Diluar Tanggungan Negara";
}elseif($cuti->jenis_cuti_id == 5){
    $jenis = "Karena Alasan Penting";
}elseif($cuti->jenis_cuti_id == 6){
    $jenis = "Sakit";
}

$cuti->cuti_status = 1;
$cuti->alasan_tolak = request('alasan_tolak');
$cuti->save();
CutiDetail::where('id_cuti', $cuti->cuti_id)->delete();

$notif = "Cuti ".$jenis. " telah ditolak";
return back()->with('danger',$notif);

}

function terimaKabid(Cuti $cuti){
    $cuti->cuti_status = 4;
    $cuti->save();
    return back()->with('success','Cuti telah diterima, menunggu verifikasi Kepala Pimpinan Pengadilan');
}

function terimaPimpinan(Cuti $cuti){
    $cuti->cuti_status = 6;
    $cuti->save();
    return back()->with('success','Cuti telah diterima, pegawai bisa mencetak surat cuti');
}


function indexTidakmasuk(){
    $author = Auth::user();

    $data['list_tidakmasuk'] = TidakMasuk::where('flag_erase',1)->where('status','!=',0)
    ->orderBy('td_masuk_id', 'DESC')
    ->get();

    $data['bulan_ini'] = TidakMasuk::where('flag_erase',1)
    ->where('status','!=',0)
    ->whereMonth('tgl_mulai_izin', date('m'))
    ->count();

    $data['hari_ini'] = TidakMasuk::where('flag_erase',1)
    ->whereDay('tgl_mulai_izin', date('D'))
    ->count();

    $data['permintaan_baru'] = TidakMasuk::where('flag_erase',1)
    ->where('status',0)
    ->count();

    return view('kasubag.permohonan-masuk.tidak-masuk.index',$data);
}

function createTidakmasuk(){
    return view('kabid.permohonan.tidak-masuk.create');
}

function storeTidakmasuk(){

    $pimpinan_id = Pegawai::where('pegawai_pimpinan',1)->where('flag_erase',1)->where('pegawai_status','PEGAWAI AKTIF')->first();

    $kabid = Pegawai::where('pegawai_pimpinan',2)
    ->where('pegawai_bidang_id', Auth::user()->pegawai_bidang_id)
    ->where('flag_erase',1)
    ->where('pegawai_status','PEGAWAI AKTIF')
    ->first();

    // dd($kabid);


    $tidakmasuk = new TidakMasuk;
    $tidakmasuk->id_pegawai_izin = Auth::user()->pegawai_id;
    $tidakmasuk->id_pimpinan_kepala = $pimpinan_id->pegawai_id;
    $tidakmasuk->id_pimpinan_bidang= $kabid->pegawai_id;
    $tidakmasuk->tgl_mulai_izin = request('tgl_mulai_izin');
    $tidakmasuk->tgl_selesai_izin = request('tgl_selesai_izin');
    $tidakmasuk->alasan_izin = request('alasan_izin');
    $tidakmasuk->save();

    return back();
}

function showTidakMasuk(TidakMasuk $tidakmasuk){
    $data['detail'] = $tidakmasuk;
    return view('kabid.permohonan-masuk.tidak-masuk.show',$data);
}

function tolakTidakMasuk(TidakMasuk $tidakmasuk){
    $tidakmasuk->alasan_tolak = request('alasan_tolak');
    $tidakmasuk->status = 1;
    $tidakmasuk->save();

    return back()->with('danger',' Tidak masuk telah ditolak');

}

function terimaTidakMasuk(TidakMasuk $tidakmasuk){
   DB::table('tidak_masuk')->where('td_masuk_id', $tidakmasuk->td_masuk_id)
   ->update([
    'status' => 2
]);
   return back()->with('success','Pengajuan tidak masuk telah diterima');
}

function tolakTidakMasukPimpinan(TidakMasuk $tidakmasuk){
 $tidakmasuk->alasan_tolak = request('alasan_tolak');
 $tidakmasuk->status = 1; 
 $tidakmasuk->save();

 return back()->with('danger','Izin tidak masuk telah ditolak');
}

function terimaTidakMasukPimpinan(TidakMasuk $tidakmasuk){
    DB::table('tidak_masuk')->where('td_masuk_id', $tidakmasuk->td_masuk_id)
    ->update([
        'status' => 4
    ]);

    return back()->with('success','Izin tidak masuk telah disetujui');
}


function cetakTidakmasuk(TidakMasuk $tidakmasuk){
    $data['detail'] = $tidakmasuk;
    $data['logo'] = '/../public/logo/logo-pn-ketapang.png';
    return view('kabid.permohonan-masuk.tidak-masuk.cetak',$data);

}

function cetakTidakmasukPegawai(TidakMasuk $tidakmasuk){
    $data['detail'] = $tidakmasuk;
    $data['logo'] = '/../public/logo/logo-pn-ketapang.png';
    return view('kabid.permohonan-masuk.tidak-masuk.cetak-pegawai',$data);

}

// =================================================

// KELUAR KANTOR ------------------------------

function indexKeluarkantor(){
    $author = Auth::user();
    $data['list_data'] = KeluarKantor::where('flag_erase',1)
    ->where('status',1)
    ->get();

    $data['bulan_ini'] = KeluarKantor::where('flag_erase',1)
    ->where('status','!=',0)
    ->whereMonth('tgl_izin', date('m'))
    ->count();

    $data['hari_ini'] = KeluarKantor::where('flag_erase',1)
    ->whereDay('tgl_izin', date('D'))
    ->count();

    $data['permintaan_baru'] = KeluarKantor::where('flag_erase',1)
    ->where('status',1)
    ->count();


    return view('kasubag.permohonan-masuk.keluar-kantor.index',$data);
}

function createKeluarkantor(){
    $author = Auth::user();
    $data['pimpinan_pn'] = Pegawai::where('pegawai_pimpinan',1)->get();
    $data['pimpinan_bidang'] = Bidang::where('bidang_id',$author->pegawai_bidang_id)->get();
    return view('kabid.permohonan.keluar-kantor.create',$data);
}


function tolakKeluarkantor(KeluarKantor $keluarkantor){
    $keluarkantor->alasan_tolak = request('alasan_tolak');
    $keluarkantor->status = 2;
    $keluarkantor->save();

    return back()->with('danger','Keluar kantor telah ditolak');

}

function terimaKeluarkantor(KeluarKantor $keluarkantor){
   DB::table('keluar_kantor')->where('keluar_kantor_id', $keluarkantor->keluar_kantor_id)
   ->update([
    'status' => 1
]);

   return back()->with('success','Keluar kantor telah disetujui');

}



function destroyKeluarkantor(KeluarKantor $keluarkantor){

   DB::table('keluar_kantor')->where('keluar_kantor_id', $keluarkantor->keluar_kantor_id)
   ->update([
    'flag_erase' => 0
]);

   return back()->with('danger','Keluar kantor telah dihapus');

}

function cetakKeluarkantor(KeluarKantor $keluarkantor){
    $data['detail'] = $keluarkantor;
    return view('kabid.permohonan.keluar-kantor.cetak',$data);

}

function showKeluarkantor(KeluarKantor $keluarkantor){
    $data['pegawai'] = Pegawai::where('pegawai_id',$keluarkantor->pegawai_id)->get();
    $data['detail'] = $keluarkantor;
    return view('kasubag.permohonan-masuk.keluar-kantor.show',$data);

}
function previewKeluarkantor(KeluarKantor $keluarkantor){
    $data['pegawai'] = Pegawai::where('pegawai_id',$keluarkantor->pegawai_id)->get();
    $data['detail'] = $keluarkantor;
    return view('kasubag.permohonan.keluar-kantor.preview',$data);

}











}
