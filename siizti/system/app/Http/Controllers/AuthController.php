<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller{

    public function login(){
        return view('login');


    }

    public function loginProcess(){

        // 0 = Admin APlikasi
        // 1 = Pimpinan PN
        // 2 = KABID
        // 3 = KASUBAG
        // 4 = pegawai biasa

       if(Auth::attempt(['pegawai_email' => request('email'), 'password' => request('password')])){
        $user =  Auth::User();

        if($user->pegawai_level == 1 ){
           return redirect('pimpinan/beranda')->with('success','Login Berhasil sebagai Pimpinan');

       }elseif($user->pegawai_level == 2){
        return redirect('kb/beranda')->with('success','Login Berhasil sebagai Kepala Bidang');

    }elseif($user->pegawai_level == 3){
        return redirect('k/beranda')->with('success','Login Berhasil sebagai Kasubbag Keportala');

    }elseif($user->pegawai_level == 0){
        return redirect('admin/beranda')->with('success','Login Berhasil sebagai Admin ');


    }elseif($user->pegawai_level == 4){
        return redirect('p/beranda')->with('success','Login Berhasil sebagai Pegawai ');
    }

}
else{
    return back()->with('danger','Periksa Username atau Password Anda!');
}

$userkey = '4888efcfc685';
$passkey = '467fd9ba6c1d7673de1cfc9b';
$telepon = '089602883681';
$my_brand = 'NaldyProject';
$otp_code = '865978';
$url = 'https://console.zenziva.net/waofficial/api/sendWAOfficial/';
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
    'brand' => $my_brand,
    'otp' => $otp_code
));
$results = json_decode(curl_exec($curlHandle), true);
curl_close($curlHandle);
}

public function logout()
{
    Auth::logout();
    return redirect('/')->with('success', 'Anda berhasil logout');
}

function surat(){
    return view('surat');
}

}
