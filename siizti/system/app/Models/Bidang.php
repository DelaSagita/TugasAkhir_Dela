<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bidang extends Model
{
    protected $table = 'bidang';
    protected $primaryKey = 'bidang_id';


    public function pimpinan()
    {
        return $this->belongsTo(Pegawai::class, 'bidang_pimpinan_id');
    }

    public function operator()
    {
        return $this->belongsTo(Pegawai::class, 'bidang_operator_id');
    }

}
