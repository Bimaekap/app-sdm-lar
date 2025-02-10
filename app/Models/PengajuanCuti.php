<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{

    protected $table = 'pengajuan_cuti';

    protected $fillable = [
        'users_id',
        'jenis_cuti' ,
        'file_pengajuan' ,
        'jumlah_cuti'
    ];
}
