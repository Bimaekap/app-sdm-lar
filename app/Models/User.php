<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\CutiUser;
use App\Models\validasiCutiUser;
use App\Models\PengajuanCutiUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
 
    public function CutiUser(): HasMany
    {
        return $this->hasMany(CutiUser::class,'user_id');
    }

    /**
     * Get all of the CutiIzin for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function CutiIzin(): HasMany
    {
        return $this->hasMany(CutiIzin::class, 'user_id');
    }
    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function validasiCutiUser(): HasOne
    {
        return $this->hasOne(validasiCutiUser::class, 'foreign_key', 'local_key');
    }

/**
     * Get all of the pengajuanCutiUser for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengajuanCutiUser(): HasMany
    {
        return $this->hasMany(PengajuanCutiUser::class,'users_id');
    }

    /**
     * Get all of the pengajuanIzinUser for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengajuanIzinUser(): HasMany
    {
        return $this->hasMany(PengajuanIzinUser::class, 'users_id');
    }
}


