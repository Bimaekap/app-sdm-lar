<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanIzinUser extends Model
{
    // Menentukan nama table
    protected $table = 'pengajuan_izin';

    protected $fillable = [
        'users_id',
        'alasan',
        'file_pengajuan',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
