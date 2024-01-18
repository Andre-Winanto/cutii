<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersetujuanPertama extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'keterangan',
        'pengajuan_cuti_id'
    ];

    public function pengajuanCuti()
    {
        return $this->belongsTo(PengajuanCuti::class);
    }
}
