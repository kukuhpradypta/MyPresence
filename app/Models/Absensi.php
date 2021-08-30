<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
       'nama_siswa',
           'nama_kelas',
            'tanggal_absen',
            'jam_masuk',
            'jam_pulang',
           'kehadiran',
           
     ];
}
