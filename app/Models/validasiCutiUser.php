<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class validasiCutiUser extends Model
{
    protected $table = 'validasi_cuti_users';

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
