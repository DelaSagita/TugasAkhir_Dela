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

class PimpinanPermohonanController extends Controller
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
        

        $data['list_cuti'] = Cuti::where('cuti_pegawai_id', Auth::user()->pegawai_id)->get();

        return view('pimpinan.permohonan.cuti.index',$data);
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


        // PIMPINAN
        $data['pimpinan'] = $pimpinan = Pegawai::where('pegawai_level',1)->where('flag_erase',1)->first();
        $data['plt_pimpinan'] = Plt::where('pegawai_plt',$pimpinan->pegawai_id)
        ->where('status_plt', 1)
        ->get();

        $data['plh_pimpinan'] = Plh::where('pegawai_plh',$pimpinan->pegawai_id)
        ->where('status_plh', 1)
        ->get();
        return view('pimpinan.permohonan.cuti.create',$data);
    }

    function storeCuti(){
        // STATUS 0 = VALIDASI KASUBAG
        // STATUS 1 = VALIDASI KABID
        // STATUS 2 = VALIDASI PIMPINAN
        // STATUS 3 = VALIDASI PIMPINAN
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
        $cuti->pimpinan_id = 0;
        $cuti->kabid_id = 0;
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



    return redirect('pimpinan/permohonan/cuti')->with('success','Cuti berhasil diajukan');
}

function showCuti(Cuti $cuti){
    $data['cuti'] = $cuti;
    return view('pegawai.permohonan.cuti.show',$data);
}

function cetakCuti(Cuti $cuti){
    $data['detail'] = $cuti;
    $data['pt'] = DB::table('pengaturan_ttd')->first();

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
    ->where('pegawai_id_cuti', 3)
    ->count();
    // dd($cek_tahun_sekarang);

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


    return view('pimpinan.permohonan.cuti.cetak',$data);
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
    return view('pimpinan.permohonan.tidak-masuk.index',$data);
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
    return view('pimpinan.permohonan.tidak-masuk.create',$data);
}

function storeTidakmasuk(){

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
    $tidakmasuk->status = 2;
    $tidakmasuk->save();

    

    return redirect('pimpinan/permohonan/tidak-masuk')->with('success','Permohonan tidak masuk telah diajukan');
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

    return back()->with('danger','Data berhasil dihapus');
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

    return view('pimpinan.permohonan.keluar-kantor.index',$data);
}

function createKeluarkantor(){
    $author = Auth::user();
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

    $data['pimpinan_pn'] = Pegawai::where('pegawai_pimpinan',1)->get();
    $data['pimpinan_bidang'] = Bidang::where('bidang_id',$author->pegawai_bidang_id)->get();
    return view('pimpinan.permohonan.keluar-kantor.create',$data);
}

function storeKeluarkantor(){
    $pimpinan_bidang = Bidang::where('bidang_id',Auth::user()->pegawai_bidang_id)->first();
    $data_pimpinan = Pegawai::where('pegawai_id', $pimpinan_bidang->bidang_pimpinan_id)->first();

    $keluar = new KeluarKantor;
    $keluar->pegawai_id = Auth::user()->pegawai_id;
    $keluar->status = 1;
    $keluar->id_pimpinan_bidang = request('atasan_id');
    $keluar->tgl_izin = request('tgl_izin');
    $keluar->jam_mulai = request('jam_mulai');
    $keluar->jam_selesai = request('jam_selesai');
    $keluar->alasan = request('alasan');
    $keluar->kode_token = Str::random(25);
    $keluar->save();



    return redirect('pimpinan/permohonan/keluar-kantor')->with('success','Izin keluar kantor sedang diproses, silahkan tunggu notifikasi selanjutnya.');
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
