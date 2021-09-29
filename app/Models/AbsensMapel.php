<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensMapel extends Model
{
    use HasFactory;
    protected $table = "absensis_mapels";
    protected $fillable = [
        'siswa',
        'kelas',
        'mapel',
        'absen',
        'hari',
        'tanggal',
        'bulan',
        'tahun',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
