<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Support\Str;

class PengaturanCuti extends Authenticatable
{
    protected $table = 'pengaturan_cuti';
    protected $primaryKey = 'pengaturan_cuti_id';
    use HasFactory, Notifiable;

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'pegawai_bidang_id');
    }

    
   
}

