<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_surat',
        'tanggal_disahkan',
        'persetujuan_kedua_id'
    ];

    public function persetujuanKedua()
    {
        return $this->belongsTo(PersetujuanKedua::class);
    }
}
