<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensis";
    protected $fillable = [
        'siswa',
        'kelas',
        'absen',
        'hari',
        'tanggal',
        'bulan',
        'tahun',
        'jam_masuk',
        'jam_pulang',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
