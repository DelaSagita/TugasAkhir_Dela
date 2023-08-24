<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;

class AdminPegawaiController extends Controller
{
    function index(){
        $data['jumlah_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_status','PEGAWAI AKTIF')
        ->count();
        $data['list_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_status','PEGAWAI AKTIF')
        ->get();
        return view('admin.pegawai.index',$data);
    }

    function show(Pegawai $pegawai){
        $data['detail'] = $pegawai;
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        return view('admin.pegawai.show',$data);
    }

    function create(){
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        return view('admin.pegawai.create',$data);
    }

    function store(){
        $nip1 = request('nip1');
        $nip2 = request('nip2');
        $nip3 = request('nip3');
        $nip4 = request('nip4');

        $nip_total = $nip1.' '.$nip2.' '.$nip3.' '.$nip4;
        $pegawai = new Pegawai;
        $pegawai->pegawai_nip = $nip_total;
        $pegawai->pegawai_nama = request('pegawai_nama');
        $pegawai->pegawai_jabatan = request('pegawai_jabatan');
        $pegawai->pegawai_golongan = request('pegawai_golongan');
        $pegawai->pegawai_unit_kerja = request('pegawai_unit_kerja');
        $pegawai->pegawai_pangkat = request('pegawai_pangkat');
        $pegawai->pegawai_bidang_id = request('pegawai_bidang_id');
        $pegawai->pegawai_tingkat_pendidikan = request('pegawai_tingkat_pendidikan');
        $pegawai->pegawai_jurusan = request('pegawai_jurusan');
        $pegawai->pegawai_agama = request('pegawai_agama');
        $pegawai->pegawai_jenis_kelamin = request('pegawai_jenis_kelamin');
        $pegawai->pegawai_tmt = request('pegawai_tmt');
        $pegawai->pegawai_sk = request('pegawai_sk');
        $pegawai->pegawai_email = request('pegawai_email');
        $pegawai->tempat_lahir = request('tempat_lahir');
        $pegawai->tgl_lahir = request('tgl_lahir');
        $pegawai->notlp = request('notlp');
        $pegawai->pegawai_level = 4;
        $pegawai->pegawai_pimpinan = 0;
        $pegawai->pegawai_status = "PEGAWAI AKTIF";
        $pegawai->username = $nip1.$nip2.$nip3.$nip4;
        $pegawai->password = bcrypt($nip1);
        $pegawai->pegawai_unit_kerja = "PN KETAPANG";
        $pegawai->save();
        return redirect('admin/pegawai')->with('success','Data pegawai berhasil dibuat');
    }

    function edit(Pegawai $pegawai){

        $data['detail'] = $pegawai;
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        return view('admin.pegawai.edit',$data);
    }

    function update(Pegawai $pegawai){

        $pegawai->pegawai_nip = request('nip');
        $pegawai->pegawai_nama = request('pegawai_nama');
        $pegawai->pegawai_jabatan = request('pegawai_jabatan');
        $pegawai->pegawai_golongan = request('pegawai_golongan');
        $pegawai->pegawai_unit_kerja = request('pegawai_unit_kerja');
        $pegawai->pegawai_pangkat = request('pegawai_pangkat');
        $pegawai->pegawai_bidang_id = request('pegawai_bidang_id');
        $pegawai->pegawai_tingkat_pendidikan = request('pegawai_tingkat_pendidikan');
        $pegawai->pegawai_jurusan = request('pegawai_jurusan');
        $pegawai->pegawai_agama = request('pegawai_agama');
        $pegawai->pegawai_jenis_kelamin = request('pegawai_jenis_kelamin');
        $pegawai->pegawai_tmt = request('pegawai_tmt');
        $pegawai->pegawai_pangkat = request('pegawai_pangkat');
        $pegawai->pegawai_sk = request('pegawai_sk');
        $pegawai->pegawai_email = request('pegawai_email');
        $pegawai->tempat_lahir = request('tempat_lahir');
        $pegawai->tgl_lahir = request('tgl_lahir');
        $pegawai->notlp = request('notlp');
        $pegawai->pegawai_unit_kerja = "PN KETAPANG";
        $pegawai->save();

        return redirect('admin/pegawai')->with('success','Data pegawai berhasil diupdate');

    }

    function destroy(Pegawai $pegawai){
        $pegawai->flag_erase = 0;
        $pegawai->save();
        return back()->with('danger','Data pegawai telah dihapus');
    }


// PENSIUN CONTROLL------------------------------------
    function indexPensiun(){
        $data['jumlah_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_status','PENSIUN')
        ->count();
        $data['list_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_status','PENSIUN')
        ->get();
        return view('operator.kepegawaian.pensiun.index',$data);
    }

     function pensiunkan(Pegawai $pegawai){
        $pegawai->pegawai_status = "PENSIUN";
        $pegawai->save();
        return redirect('o/kepegawaian/pensiun')->with('success','Pegawai berhasil dipensiunkan');
    }

    function aktifkan(Pegawai $pegawai){
        $pegawai->pegawai_status = "PEGAWAI AKTIF";
        $pegawai->save();
        return redirect('o/kepegawaian/pegawai')->with('success','Pegawai berhasil diaktifkan');
    }



// HONORER CONTROLL------------------------------------
    function indexHonorer(){
        $data['jumlah_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_status','HONORER')
        ->count();
        $data['list_pegawai'] = Pegawai::where('flag_erase',1)
        ->where('pegawai_status','HONORER')
        ->get();
        return view('operator.kepegawaian.honorer.index',$data);
    }

    function createHonorer(){
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        return view('operator.kepegawaian.honorer.create',$data);
    }


    function storeHonorer(){
        $pegawai = new Pegawai;
        $pegawai->pegawai_nip = 0;
        $pegawai->pegawai_nama = request('pegawai_nama');
        $pegawai->pegawai_jabatan = request('pegawai_jabatan');
        $pegawai->pegawai_golongan = request('pegawai_golongan');
        $pegawai->pegawai_bidang_id = request('pegawai_bidang_id');
        $pegawai->pegawai_tingkat_pendidikan = request('pegawai_tingkat_pendidikan');
        $pegawai->pegawai_jurusan = request('pegawai_jurusan');
        $pegawai->pegawai_agama = request('pegawai_agama');
        $pegawai->pegawai_jenis_kelamin = request('pegawai_jenis_kelamin');
        $pegawai->pegawai_tmt = request('pegawai_tmt');
        $pegawai->pegawai_sk = request('pegawai_sk');
        $pegawai->pegawai_email = request('pegawai_email');
        $pegawai->tempat_lahir = request('tempat_lahir');
        $pegawai->tgl_lahir = request('tgl_lahir');
        $pegawai->notlp = request('notlp');
        $pegawai->pegawai_level = 2;
        $pegawai->pegawai_pimpinan = 0;
        $pegawai->pegawai_status = "HONORER";
        $pegawai->password = bcrypt(12345678);
        $pegawai->save();
        return redirect('o/kepegawaian/honorer')->with('success','Data pegawai berhasil dibuat');
    }

   
}




















