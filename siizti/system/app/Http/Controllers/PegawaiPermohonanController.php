<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengaturanCuti;
use App\Models\KalenderLibur;
use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\Plt;
use App\Models\Plh;
use App\Models\Bidang;
use App\Models\CutiDetail;
use App\Models\TidakMasuk;
use App\Models\KeluarKantor;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PegawaiPermohonanController extends Controller
{
    function indexCuti(){


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
        

        $data['list_cuti'] = Cuti::where('cuti_pegawai_id', Auth::user()->pegawai_id)
        ->where('flag_erase',1)
        ->orderBy('cuti_id','DESC')
        ->get();

        return view('pegawai.permohonan.cuti.index',$data);
    }

    function createCuti(){
        $data['list_jenis_cuti'] = PengaturanCuti::where('flag_erase',1)->get();

        // KASUBAG
        $data['kasubag'] = $kasubag = Pegawai::where('pegawai_level',3)->where('flag_erase',1)->first();
        $data['plt_kasubag'] = Plt::where('pegawai_plt',$kasubag->pegawai_id)
        ->where('status_plt', 1)
        ->get();

        $data['plh_kasubag'] = Plh::where('pegawai_plh',$kasubag->pegawai_id)
        ->where('status_plh', 1)
        ->get();


        // ATASAN
        $data['atasan'] = $atasan = Pegawai::where('pegawai_level','!=',4)
        ->where('flag_erase',1)
        ->where('pegawai_bidang_id', Auth::user()->pegawai_bidang_id)
        ->first();


        $data['plt_atasan'] = Plt::where('pegawai_plt',$atasan->pegawai_id)
        ->where('status_plt', 1)
        ->get();

        $data['plh_atasan'] = Plh::where('pegawai_plh',$atasan->pegawai_id)
        ->where('status_plh', 1)
        ->get();

        // khusus kasubag
        $id_atasan = Bidang::where('bidang_nama','Kesekretariatan')->first();
        $data['atasankasubag'] = Pegawai::where('pegawai_id',$id_atasan->bidang_pimpinan_id)->first();

        // PIMPINAN
        $data['pimpinan'] = $pimpinan = Pegawai::where('pegawai_level',1)->where('flag_erase',1)->first();
        $data['plt_pimpinan'] = Plt::where('pegawai_plt',$pimpinan->pegawai_id)
        ->where('status_plt', 1)
        ->get();

        $data['pimpinanpn'] = Pegawai::where('pegawai_level',1)->first();
        $kesekretariatan_id = Bidang::where('bidang_nama','Kesekretariatan')->first();
        $data['kesekretariatan'] = Pegawai::where('pegawai_id',$kesekretariatan_id->bidang_pimpinan_id)->first();

        $data['list_kabid'] = Pegawai::where('pegawai_level',2)->where('flag_erase',1)->where('pegawai_status','PEGAWAI AKTIF')
        ->where('pegawai_id','!=', Auth::user()->pegawai_id)
        ->get();

        $data['plh_pimpinan'] = Plh::where('pegawai_plh',$pimpinan->pegawai_id)
        ->where('status_plh', 1)
        ->get();
        return view('pegawai.permohonan.cuti.create',$data);
    }

    function storeCuti(){
        // STATUS 0 = VALIDASI KASUBAG
        // STATUS 1 = VALIDASI KABID
        // STATUS 2 = VALIDASI PIMPINAN
        // STATUS 3 = VALIDASI PIMPINAN

       // $tgl_mulai = Carbon::parse($st->surattugas_mulai)->translatedFormat('d F Y');
       // $tgl_selesai = Carbon::parse($st->surattugas_selesai)->translatedFormat('d F Y');

        $mulai = strtotime(request('tgl_mulai_cuti'));
        $selesai = strtotime(request('tgl_selesai_cuti'));

        if($selesai < $mulai){
            return back()->with('danger','Ada kesalahan pada tanggal cuti yang diajukan');
        }else{

            $jenis = '';
            if(request('jenis_cuti_id') == 1){
                $jenis = "Tahunan";
            }elseif(request('jenis_cuti_id') == 2){
               $jenis = "Besar";
           }elseif(request('jenis_cuti_id') == 3){
            $jenis = "Melahirkan";
        }elseif(request('jenis_cuti_id') == 4){
            $jenis = "Diluar Tanggungan Negara";
        }elseif(request('jenis_cuti_id') == 5){
            $jenis = "Karena Alasan Penting";
        }elseif(request('jenis_cuti_id') == 6){
            $jenis = "Sakit";
        }

        $kasubag = Pegawai::where('pegawai_level',3)->where('flag_erase',1)->first();
        $pimpinan = Pegawai::where('pegawai_level',1)->where('flag_erase',1)->first();
        $kabid = Bidang::where('bidang_id',Auth::user()->pegawai_bidang_id)->first();

        $cuti = new Cuti;
        $cuti->cuti_pegawai_id = Auth::user()->pegawai_id;
        $cuti->kode_cuti = mt_rand(100000,999999);
        $cuti->alasan_cuti = request('alasan_cuti');
        $cuti->alamat_selama_cuti = request('alamat_selama_cuti');
        $cuti->jenis_cuti_id = request('jenis_cuti_id');
        $cuti->tgl_mulai_cuti = request('tgl_mulai_cuti');
        $cuti->tgl_selesai_cuti = request('tgl_selesai_cuti');
        $cuti->kasubag_id = request('kasubag_id');
        $cuti->pimpinan_id = request('pimpinan_id');
        $cuti->kabid_id = request('atasan_id');
        $cuti->handleUploadFile();
        $cuti->cuti_status = 0;
        $cuti->kode_token = Str::random(25);
        $cuti->save();

        $tanggalMulaiCt = date('d', strtotime(request('tgl_mulai_cuti')));
        $bulanMulaiCt = date('m', strtotime(request('tgl_mulai_cuti')));
        $tahunMulaiCt = date('Y', strtotime(request('tgl_mulai_cuti')));
        $tanggalSelesaiCt = date('d', strtotime(request('tgl_selesai_cuti')));

        $bulanSelesaiCt = date('m', strtotime(request('tgl_selesai_cuti')));


        for ($x = $tanggalMulaiCt; $x <= $tanggalSelesaiCt; $x++) {

         $p[] = DB::table('cuti_detail')->insert([
            'id_cuti' => $cuti->cuti_id,
            'pegawai_id_cuti' => Auth::user()->pegawai_id,
            'pengaturan_cuti_id' => $cuti->jenis_cuti_id,
            'tgl_cuti_full' => $tahunMulaiCt.'-'.$bulanMulaiCt.'-'.$x,
            'tgl_cuti' => $x,
            'hari_cuti' => Carbon::parse($tahunMulaiCt.'-'.$bulanMulaiCt.'-'.$x)->isoFormat('dddd'),
            'bulan_cuti' => $bulanMulaiCt,
            'tahun_cuti' => $tahunMulaiCt,
            'status_cuti' => 1,
            'created_at' => Carbon::now(),

        ]);
     }


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



    $nomor = $kasubag->notlp;
    $pesan = "Haii ".$kasubag->pegawai_nama.", Pegawai atas nama ".Auth::user()->pegawai_nama." mengajukan Cuti. silahkan cek aplikasi";

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


    $notif = "Pengajuan Cuti ".$jenis. ' berhasil diajukan';
    return redirect('p/permohonan/cuti')->with('success',$notif);
}


}

function showCuti(Cuti $cuti){
    $data['detail'] = $cuti;
    return view('pegawai.permohonan.cuti.show',$data);
}

function cetakCuti(Cuti $cuti){
    $data['detail'] = $cuti;

    $author = Pegawai::where('pegawai_id', $cuti->cuti_pegawai_id)->first();
    $bulanSekarang = date('m');
    $data['totalcutibulan'] = Cuti::whereMonth('tgl_mulai_cuti',$bulanSekarang)->where('flag_erase',1)->count();

    // proses pengecekan sisa cuti


    
// ============= CUTI TAHUNAN ===============================
    $data['tahun_sekarang'] = date('Y');
    $data['tahun_1'] = $tahun_1 = date('Y') - 1;
    $data['tahun_2'] = $tahun_2 = date('Y') - 2;

    $cek_tahun_1 =  CutiDetail::where('tahun_cuti',$tahun_1)
    ->where('status_cuti',1)
    ->where('pengaturan_cuti_id',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
    ->count();

    
    $cek_tahun_2 =  CutiDetail::where('tahun_cuti',$tahun_2)
    ->where('status_cuti',1)
    ->where('pengaturan_cuti_id',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
    ->count();

    $cek_tahun_sekarang = CutiDetail::where('tahun_cuti',date('Y'))
    ->where('status_cuti',1)
    ->where('pengaturan_cuti_id',1)
    ->where('pegawai_id_cuti', $author->pegawai_id)
    ->count();

    $cek_now = $cek_tahun_sekarang;
    $data['sisa_now'] = $sisa_now = 12 - $cek_now;

    $cek_1 = $cek_tahun_1;
    $data['sisa_1'] = $sisa_1 = 0;
    if($cek_1 < 7){
      $data['sisa_1'] = $sisa_1 = 6;
  }elseif($cek_1 > 6){
      $data['sisa_1'] = $sisa_1 = 12 - $cek_1;
  }

  $cek_2 = $cek_tahun_2;
  $data['sisa_2'] = $sisa_2 = 0;
  if($cek_2 < 7){
      $data['sisa_2'] = $sisa_2 = 6;
  }elseif($cek_2 > 6){
      $data['sisa_2'] = $sisa_2 = 12 - $cek_2;
  }

  $data['hasil_sisa_cuti_tahunan'] = $sisa_now + $sisa_1 + $sisa_2;
  $data['jumlah_hari'] = CutiDetail::where('id_cuti', $cuti->cuti_id)->count();
  $data['hasil_hari'] = $data['hasil_sisa_cuti_tahunan'] - $data['jumlah_hari'];

  $data['ttd_pegawai'] = Pegawai::where('pegawai_id', $cuti->cuti_pegawai_id)->first();
  $data['ttd_kabid'] = Pegawai::where('pegawai_id', $cuti->kabid_id)->first();
  $data['ttd_pimpinan'] = Pegawai::where('pegawai_id', $cuti->pimpinan_id)->first();


  return view('pegawai.permohonan.cuti.cetak',$data);
}

function destroyCuti(Cuti $cuti){

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


CutiDetail::where('id_cuti', $cuti->cuti_id)->delete();
$cuti->delete();
$notif = "Cuti ".$jenis. " berhasil dihapus";
return back()->with('danger',$notif);
}



// TIDAK MASUK --------------------

function indexTidakmasuk(){
    $author = Auth::user();
    $data['list_data'] = TidakMasuk::where('id_pegawai_izin',$author->pegawai_id)->where('flag_erase',1)->get();
    $mon = date('m');
    $data['count_data'] = TidakMasuk::whereMonth('created_at',$mon)
    ->where('id_pegawai_izin', Auth::user()->pegawai_id)
    ->where('flag_erase',1)
    ->count();
    return view('pegawai.permohonan.tidak-masuk.index',$data);
}

function createTidakmasuk(){
     // ATASAN
    $data['pimpinan'] = $pimpinan = Pegawai::where('pegawai_level',1)
    ->where('flag_erase',1)
    ->first();


    $data['plt_atasan'] = Plt::where('pegawai_plt',$pimpinan->pegawai_id)
    ->where('status_plt', 1)
    ->get();

    $data['plh_atasan'] = Plh::where('pegawai_plh',$pimpinan->pegawai_id)
    ->where('status_plh', 1)
    ->get();
    return view('pegawai.permohonan.tidak-masuk.create',$data);
}

function storeTidakmasuk(){

    $mulai = strtotime(request('tgl_mulai_izin'));
    $selesai = strtotime(request('tgl_selesai_izin'));

    if($selesai < $mulai){
        return back()->with('danger',' Ada kesalahan pada tanggal izin tidak masuk yang anda ajukan !!!');
    }else{

        $pimpinan_id = Pegawai::where('pegawai_pimpinan',1)->where('flag_erase',1)->where('pegawai_status','PEGAWAI AKTIF')->first();

        $kabid = Pegawai::where('pegawai_id',request('atasan_id'))
        ->first();

    // dd($kabid);


        $tidakmasuk = new TidakMasuk;
        $tidakmasuk->id_pegawai_izin = Auth::user()->pegawai_id;
        $tidakmasuk->id_pimpinan_pn = $pimpinan_id->pegawai_id;
        $tidakmasuk->id_pimpinan_bidang= request('atasan_id');
        $tidakmasuk->tgl_mulai_izin = request('tgl_mulai_izin');
        $tidakmasuk->tgl_selesai_izin = request('tgl_selesai_izin');
        $tidakmasuk->alasan_izin = request('alasan_izin');
        $tidakmasuk->kode_token = Str::random(25);
        $tidakmasuk->save();

        $pesan = "Haii ".$kabid->pegawai_nama.", Pegawai atas nama ".Auth::user()->pegawai_nama." mengajukan izin tidak masuk dengan alasan *".request('alasan_izin'). "*, silahkan cek aplikasi";

        $userkey = '4888efcfc685';
        $passkey = '467fd9ba6c1d7673de1cfc9b';
        $telepon = $kabid->notlp;
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

        return redirect('p/permohonan/tidak-masuk')->with('success','Permohonan tidak masuk telah dibuat');
    }
    

    
}

function cetakTidakmasuk(TidakMasuk $tidakmasuk){
    $data['detail'] = $tidakmasuk;
    $data['logo'] = '/../public/logo/logo-pn-ketapang.png';
    return view('pegawai.permohonan.tidak-masuk.cetak',$data);

}
function cetakTidakmasukPegawai(TidakMasuk $tidakmasuk){
    $data['detail'] = $tidakmasuk;

    // RUMUS MENGHITUNG HARI
    $tgl1 = strtotime($tidakmasuk->tgl_mulai_izin); 
    $tgl2 = strtotime($tidakmasuk->tgl_selesai_izin); 
    $jarak = $tgl2 - $tgl1;
    $data['jumlah_hari'] = $jarak / 60 / 60 / 24 + 1;
     // RUMUS MENGHITUNG HARI


    $data['logo'] = '/../public/logo/logo-pn-ketapang.png';
    return view('pegawai.permohonan.tidak-masuk.cetak-pegawai',$data);

}

function destroyTidakMasuk(TidakMasuk $tidakmasuk){

    DB::table('tidak_masuk')->where('td_masuk_id', $tidakmasuk->td_masuk_id)->update([
        'flag_erase' => 0
    ]);

    return back()->with('danger','Data tidak masuk berhasil dihapus');
}



// KELUAR KANTOR ------------------------------

function indexKeluarkantor(){
    $author = Auth::user();
    $data['list_data'] = KeluarKantor::where('flag_erase',1)
    ->where('pegawai_id', $author->pegawai_id)
    ->get();

    $mon = date('m');
    $data['count_data'] = KeluarKantor::whereMonth('created_at',$mon)
    ->where('pegawai_id', Auth::user()->pegawai_id)
    ->where('flag_erase',1)
    ->count();

    return view('pegawai.permohonan.keluar-kantor.index',$data);
}

function createKeluarkantor(){
    $author = Auth::user();
      // ATASAN
    $data['atasan'] = $atasan = Pegawai::where('pegawai_level','!=',4)
    ->where('flag_erase',1)
    ->where('pegawai_bidang_id', Auth::user()->pegawai_bidang_id)
    ->first();


    $data['list_kabid'] = Pegawai::where('pegawai_level',2)->where('flag_erase',1)->where('pegawai_status','PEGAWAI AKTIF')
    ->where('pegawai_id','!=', Auth::user()->pegawai_id)
    ->get();


    $data['plt_atasan'] = Plt::where('pegawai_plt',$atasan->pegawai_id)
    ->where('status_plt', 1)
    ->get();

    $data['plh_atasan'] = Plh::where('pegawai_plh',$atasan->pegawai_id)
    ->where('status_plh', 1)
    ->get();

    $data['pimpinanpn'] = Pegawai::where('pegawai_pimpinan',1)->first();
    $data['kasubag'] = Pegawai::where('pegawai_level',3)->first();
    $data['pimpinan_bidang'] = Bidang::where('bidang_id',$author->pegawai_bidang_id)->get();
    return view('pegawai.permohonan.keluar-kantor.create',$data);
}

function storeKeluarkantor(){

    $mulai = strtotime(request('jam_mulai'));
    $selesai = strtotime(request('jam_selesai'));

    if($selesai < $mulai){
        return back()->with('danger',' Jam izin keluar kantor yang anda ajukan melewati batas waktu ');
    }else{

        $pimpinan_bidang = Bidang::where('bidang_id',Auth::user()->pegawai_bidang_id)->first();
        $data_pimpinan = Pegawai::where('pegawai_id', $pimpinan_bidang->bidang_pimpinan_id)->first();

        $keluar = new KeluarKantor;
        $keluar->pegawai_id = Auth::user()->pegawai_id;
        $keluar->status = 0;
        $keluar->id_pimpinan_bidang = request('atasan_id');
        $keluar->tgl_izin = request('tgl_izin');
        $keluar->jam_mulai = request('jam_mulai');
        $keluar->jam_selesai = request('jam_selesai');
        $keluar->alasan = request('alasan');
        $keluar->kode_token = Str::random(25);
        $keluar->save();




        $pesan = "Haii ".$data_pimpinan->pegawai_nama.", Pegawai atas nama ".Auth::user()->pegawai_nama." mengajukan izin keluar kantor dengan alasan *".request('alasan'). "*, silahkan cek aplikasi";

        $userkey = '4888efcfc685';
        $passkey = '467fd9ba6c1d7673de1cfc9b';
        $telepon = '081240515616';
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

        return redirect('p/permohonan/keluar-kantor')->with('success','Izin keluar kantor sedang diproses, silahkan tunggu notifikasi selanjutnya.');
    }

    
}

function tolakKeluarkantor(KeluarKantor $keluarkantor){
    DB::table('keluar_kantor')->where('keluar_kantor_id', $keluarkantor->keluar_kantor_id)
    ->update([
        'status' => 3
    ]);

    return back()->with('danger','Keluar kantor telah ditolak');

}

function terimaKeluarkantor(KeluarKantor $keluarkantor){
 DB::table('keluar_kantor')->where('keluar_kantor_id', $keluarkantor->keluar_kantor_id)
 ->update([
    'status' => 3
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
    return view('pegawai.permohonan.keluar-kantor.cetak',$data);

}

function showKeluarkantor(KeluarKantor $keluarkantor){
    $data['pegawai'] = Pegawai::where('pegawai_id',$keluarkantor->pegawai_id)->get();
    $data['detail'] = $keluarkantor;
    return view('pegawai.permohonan.keluar-kantor.show',$data);

}
function previewKeluarkantor(KeluarKantor $keluarkantor){
    $data['pegawai'] = Pegawai::where('pegawai_id',$keluarkantor->pegawai_id)->get();
    $data['detail'] = $keluarkantor;
    return view('pegawai.permohonan.keluar-kantor.preview',$data);

}











}
