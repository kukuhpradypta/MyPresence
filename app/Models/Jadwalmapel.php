<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalmapel extends Model
{
    use HasFactory;
    protected $table = 'jadwalmapels';
    protected $fillable = [
        'waktu',
        'hari',
        'mapel',
        'guru',
        'kelas',
        'ruangan',
    
    ];
    
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function jam()
    {
        return $this->belongsTo(Jam::class);
    }
}
