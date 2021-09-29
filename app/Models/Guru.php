<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guru extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $table = "siswa";
    // protected $primarykey = "id_siswa";

    protected $fillable = [
        'namaguru',
        'nuptk',
        'Foto',
        'role',
        'username',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function jadwalmapel()
    {
        return $this->hasMany(Jadwalmapel::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
