<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Support\Str;

class Plh extends Authenticatable
{
    protected $table = 'plh';
    protected $primaryKey = 'plh_id';
    use HasFactory, Notifiable;

    public function plh(){
        return $this->belongsTo(Pegawai::class, 'pegawai_plh');
    }

    public function pengganti(){
        return $this->belongsTo(Pegawai::class, 'pegawai_pengganti_plh');
    }

    
   
}

