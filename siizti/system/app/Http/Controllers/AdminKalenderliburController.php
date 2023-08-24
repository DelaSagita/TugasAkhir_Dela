<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KalenderLibur;
use Carbon\Carbon;

class AdminKalenderliburController extends Controller
{
    function index(){
        $data['sekarang'] = date('Y-m-d');
        $data['list_kalender'] = KalenderLibur::where('flag_erase',1)->get();
        $data['jumlah_libur'] = KalenderLibur::where('flag_erase',1)
        ->whereYear('tgl',date('Y'))
        ->count();

        return view('admin.kalender-libur.index',$data);
    }

    function store(){
        $post = new KalenderLibur;
        $pecahan = request('tgl_libur');
        $post->tgl = $pecahan;
        $post->tgl_libur = date('d', strtotime($pecahan));
        $post->bulan_libur = date('m', strtotime($pecahan));
        $post->tahun_libur = date('Y', strtotime($pecahan));
        $post->hari_libur = Carbon::parse($pecahan)->isoFormat('dddd');
        $post->nama_even = request('nama_even');
        $post->save();
        return back()->with('success','Kalender libur berhasil dibuat');
    }

    function destroy(KalenderLibur $kalender){
        $kalender->flag_erase = 0;
        $kalender->save();
        return back()->with('danger','Kalender libur telah dihapus');
    }
}
