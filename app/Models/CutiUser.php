<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CutiUser extends Model
{
    protected $table = 'cuti_user';

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'id',
        'user_id',
        'jenis_cuti',
        'jumlah_cuti',
    ];

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class,'id');
    }
}
