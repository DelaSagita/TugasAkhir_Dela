<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\Plt;
use App\Models\Plh;
use DB;

class PlController extends Controller
{
   function indexPlt(){
    $data['list_plt'] = Plt::where('flag_erase',1)->get();
    return view('admin.plt.index',$data);
   }

   function createPlt(){
    $data['list_pimpinan'] = Pegawai::where('pegawai_level','>',0)->where('pegawai_level','!=',4)->get();
    $data['list_pegawai'] = Pegawai::where('flag_erase',1)
    ->where('pegawai_status','PEGAWAI AKTIF')
    ->where('status_plt',0)
    ->get();
    return view('admin.plt.create',$data);
   }

   function storePlt(){
    $plt = new Plt;
    $pegawai_pengganti_plt = $plt->pegawai_pengganti_plt = request('pegawai_pengganti_plt');
    $jabatan = $plt->pegawai_plt = request('pegawai_plt');
    $plt->plt_mulai = request('plt_mulai');
    $plt->plt_selesai = request('plt_selesai');
    $plt->plt_jabatan = 'Plt. '. Pegawai::where('pegawai_id',request('pegawai_plt'))->first()->pegawai_jabatan;
    $plt->plt_jabatan_asal = Pegawai::where('pegawai_id',request('pegawai_pengganti_plt'))->first()->pegawai_jabatan;
    $plt->save();

    DB::table('pegawai')->where('pegawai_id', $pegawai_pengganti_plt)->update([
        'pegawai_jabatan' => 'Plt. '.Pegawai::where('pegawai_id',request('pegawai_plt'))->first()->pegawai_jabatan,
        'status_plt' => 1
    ]);
    return redirect("admin/plt")->with('success','Plt berhasil dibuat');
   }

   function destroyPlt(Plt $plt){
    $plt->flag_erase = 0;
    $plt->status_plt = 0;
    $plt->save();
    return back()->with('danger','Data Plt telah dihapus');
   }

   function selesaiPlt(Plt $plt){
    $plt->flag_erase = 1;
    $plt->status_plt = 0;
    $plt->save();
    return back()->with('success','Data Plh telah selesai');
   }

   function destroyPlh(Plh $plh){
    $plh->flag_erase = 0;
    $plh->status_plh = 0;
    $plh->save();
    return back()->with('danger','Data Plh telah dihapus');
   }

    function selesaiPlh(Plh $plh){
    $plh->flag_erase = 1;
    $plh->status_plh = 0;
    $plh->save();
    return back()->with('success','Data Plh telah selesai');
   }

   // PLH ==================================
    function indexPlh(){
    $data['list_plh'] = Plh::where('flag_erase',1)->get();
    return view('admin.plh.index',$data);
   }

   function createPlh(){
    $data['list_pimpinan'] = Pegawai::where('pegawai_level','>',0)->where('pegawai_level','!=',4)->get();
    $data['list_pegawai'] = Pegawai::where('flag_erase',1)
    ->where('pegawai_status','PEGAWAI AKTIF')
    ->where('status_plh',0)
    ->get();
    return view('admin.plh.create',$data);
   }

   function storePlh(){
    $plh = new Plh;
    $pegawai_pengganti_plh = $plh->pegawai_pengganti_plh = request('pegawai_pengganti_plh');


    $jabatan = $plh->pegawai_plh = request('pegawai_plh');
    $plh->plh_mulai = request('plh_mulai');
    $plh->plh_selesai = request('plh_selesai');
    $plh->plh_jabatan = 'plh. '. Pegawai::where('pegawai_id',request('pegawai_plh'))->first()->pegawai_jabatan;
    $plh->plh_jabatan_asal = Pegawai::where('pegawai_id',request('pegawai_pengganti_plh'))->first()->pegawai_jabatan;
    $plh->save();

    DB::table('pegawai')->where('pegawai_id', $pegawai_pengganti_plh)->update([
        'pegawai_jabatan' => 'Plh. '.Pegawai::where('pegawai_id',request('pegawai_plh'))->first()->pegawai_jabatan,
        'status_plh' => 1
    ]);
    return redirect("admin/plh")->with('success','Plh berhasil dibuat');
   }
}
