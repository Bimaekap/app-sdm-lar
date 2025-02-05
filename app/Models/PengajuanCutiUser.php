<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class PengajuanCutiUser extends Model
{
    protected $table = 'pengajuan_cuti';

    protected $fillable = [
        'users_id',
        'jenis_cuti',
        'file_pengajuan',
        'jumlah_cuti',
    ];
    
     /**
     * The roles that belong to the PengajuanCutiUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}

