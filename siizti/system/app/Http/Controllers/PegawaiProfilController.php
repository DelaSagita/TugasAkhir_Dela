<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use Hash;
use Auth;
use DB;

class PegawaiProfilController extends Controller
{
  function index(){
    $data['list_bidang'] = Bidang::all();
    $data['detail'] = Auth::user();
    return view('pegawai.profil.index',$data);
 }

 function update(){
  $user = Auth::user();
  $user->handleUploadFoto();
  $user->save();
  return back()->with('success','Profil telah diupdate');
}

function gantiPasword(){
 $data = request()->all();

 if(request('current')){


   $check = Hash::check(request('current'), Auth::user()->password);
   if($check){
      if(request('new') == request('confirm')){

         DB::table('pegawai')->where('pegawai_id', Auth::user()->pegawai_id)->update([

            'password' => bcrypt(request('new'))

         ]);

         return redirect('logout')->with('success','password telah diganti, silahkan masuk kembali');

      }else{
         return back()->with('danger', 'Password Baru Tidak cocok');

      }
   }

}else{


}
}
}
