<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Support\Str;

class KeluarKantor extends Authenticatable
{
    protected $table = 'keluar_kantor';
    protected $primaryKey = 'keluar_kantor_id';
     protected $dates = ['dob'];
    use HasFactory, Notifiable;

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

     public function pimpinanBidang()
    {
        return $this->belongsTo(Pegawai::class, 'id_pimpinan_bidang');
    }

    
   
}

