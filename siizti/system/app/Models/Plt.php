<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Support\Str;

class Plt extends Authenticatable
{
    protected $table = 'plt';
    protected $primaryKey = 'plt_id';
    use HasFactory, Notifiable;

    public function plt(){
        return $this->belongsTo(Pegawai::class, 'pegawai_plt');
    }

    public function pengganti(){
        return $this->belongsTo(Pegawai::class, 'pegawai_pengganti_plt');
    }

    
   
}

