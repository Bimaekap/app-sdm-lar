<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KategoriCuti extends Model
{
    protected  $table = 'kategori_cuti';


    protected $primaryKey = 'cuti_id';
    protected $fillable = [
        'id',
        'jenis_cuti',
        'jumlah_cuti',
        'status',
    ];   
}

