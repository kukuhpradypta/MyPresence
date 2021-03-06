<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapels';
    protected $fillable = [
        'name',
    ];
    public function jadwal()
    {
        return $this->hasMany(Jadwalmapel::class);
    }
}
