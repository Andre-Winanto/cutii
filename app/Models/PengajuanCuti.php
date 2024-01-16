<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'NIP',
        'nama_kelompok',
        'jenis_cuti',
        'alasan',
        'tanggal_mulai_cuti',
        'tanggal_akhir_cuti',
        'alamat'
    ];
}
