<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalmapel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_mapel',
        'nama_guru',
        'nama_kelas',
        'tanggal_mapel',
        'jam_pelajaran',
           
     ];
}
