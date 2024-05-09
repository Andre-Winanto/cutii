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
        'alamat_cuti',
        'file',
        'status'
    ];

    public function persetujuanPertama()
    {
        // $this->hasMany(PersetujuanPertama::class);
        return $this->hasOne(PersetujuanPertama::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'NIP', 'NIP');
    }
}
