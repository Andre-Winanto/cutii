<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelompok'
    ];

    public function dataKetua()
    {
        // nama_kelompok1 => foreign key, nama_kelompok2 =>local key.
        return $this->hasOne(Atasan::class, 'nama_kelompok', 'nama_kelompok');
    }
}
