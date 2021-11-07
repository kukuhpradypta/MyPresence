<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $table = "siswa";
    // protected $primarykey = "id_siswa";

    protected $fillable = [
        'nama',
        'nisn',
        'foto',
        'kelas_id',
        'nipd',
        'email',
        'password',
        'no_kartu',
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
        return $this->belongsTo(Kelas::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function absenmapel()
    {
        return $this->hasMany(AbsensiMapel::class);
    }
}
