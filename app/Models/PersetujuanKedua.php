<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersetujuanKedua extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'keterangan',
        'persetujuan_pertama_id'
    ];

    public function persetujuanPertama()
    {
        return $this->belongsTo(PersetujuanPertama::class);
    }
}
