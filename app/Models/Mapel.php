<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapels';
    protected $fillable = [
        'kelas_id',
     ];
         public function jadwalmapel()
    {
        return $this->hasMany(Kelas::class);
    }
        public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
