<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class validasiCutiUser extends Model
{
    protected $table = 'validasi_cuti_users';

    protected $fillable = [
        'user_id',
        'nama_pengaju',
        'nama_pimpinan',
        'jenis_cuti',
        'jenis_pengajuan',
        'jumlah_cuti',
        'izin_1',
        'izin_2',
        'izin_3',
    ];
    /**
     * Get the user that owns the validasiCutiUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
