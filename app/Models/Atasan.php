<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Atasan extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $table = 'atasans';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'NIP',
        'nama',
        'jabatan',
        'nama_kelompok',
        'ttd',
        'golongan',
        'masa_kerja',
        'email',
        'password'
    ];

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'nama_kelompok', 'nama_kelompok');
    }
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
