<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Support\Str;

class TidakMasuk extends Authenticatable
{
    protected $table = 'tidak_masuk';
    protected $primaryKey = 'td_masuk_id';
    use HasFactory, Notifiable;

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai_izin');
    }

     public function pimpinanBidang()
    {
        return $this->belongsTo(Pegawai::class, 'id_pimpinan_bidang');
    }
      public function pimpinanPn()
    {
        return $this->belongsTo(Pegawai::class, 'id_pimpinan_pn');
    }

    
   
}

