<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use Hash;
use Auth;

class OperatorProfilController extends Controller
{
    function index(){
        $data['list_bidang'] = Bidang::all();
        $data['detail'] = Auth::user();
        return view('operator.profil.index',$data);
    }

    function gantiPasword(){
        $data = request()->all();

      if(request('current')){
         $user = Auth::user();
         $check = Hash::check(request('current'), Auth::user()->password);
         if($check){
            if(request('new') == request('confirm')){

               $user->password = bcrypt(request('new'));
               $user->save();

               return back()->with('success', 'Password Berhasil Diganti');

            }else{
            return back()->with('danger', 'Password Baru Tidak cocok');

            }
         }else{
            return back()->with('danger', 'Password Sekarang Salah');
         }
         
      }else{


      }
    }
}
