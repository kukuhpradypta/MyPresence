<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;
    protected $table = 'jam';
    protected $fillable = [
        'name',
        'awal',
        'akhir'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwalmapel::class);
    }
}
