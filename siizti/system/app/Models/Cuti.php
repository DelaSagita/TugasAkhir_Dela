<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $primaryKey = 'cuti_id';

     function handleUploadFile()
      {
  
          if (request()->hasFile('file')) {
              $foto = request()->file('file');
              $destination = 'public/app/file';
              $randomStr = Str::random(10);
              $filename = $randomStr . "-filependukung" .".". $foto->extension();
              $url = $foto->move($destination, $filename);
              $this->file_pendukung = $filename;
              $this->save;
          }

      }

      function handleDeleteFile(){
        $pathdefault = base_path();
        $pathbase = dirname($pathdefault);
        $path = $pathbase.'/public/app/file/' . $this->file_pendukung;
        if (file_exists($path)) {
            unlink($path);
        }
      }

    public function jeniscuti()
    {
        return $this->belongsTo(PengaturanCuti::class, 'jenis_cuti_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'cuti_pegawai_id');
    }

    public function kasubag(){
        return $this->belongsTo(Pegawai::class, 'kasubag_id');
    }


     public function pimpinanBidang()
    {
        return $this->belongsTo(Pegawai::class, 'pimpinan_id');
    }



}
