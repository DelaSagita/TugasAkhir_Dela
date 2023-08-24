<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Support\Str;

class Pegawai extends Authenticatable
{
    protected $table = 'pegawai';
    protected $primaryKey = 'pegawai_id';
    use HasFactory, Notifiable;

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'pegawai_bidang_id');
    }


    function handleUploadFoto()
      {
  
          if (request()->hasFile('file')) {
              $foto = request()->file('file');
              $destination = 'public/app/pegawai';
              $randomStr = Str::random(10);
              $filename = $randomStr . "-profil" .".". $foto->extension();
              $url = $foto->move($destination, $filename);
              $this->foto = $filename;
              $this->save;
          }

      }

      function handleDeleteFoto(){
        $pathdefault = base_path();
        $pathbase = dirname($pathdefault);
        $path = $pathbase.'/public/app/pegawai/' . $this->foto;
        if (file_exists($path)) {
            unlink($path);
        }
      }

    
   
}

