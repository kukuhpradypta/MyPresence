<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelastbs';
    protected $fillable = [
        'name',
        'walas_id',
           
     ];

     public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
         public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function jadwalmapel()
    {
        return $this->hasMany(Kelas::class);
    }
    public function Mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}


