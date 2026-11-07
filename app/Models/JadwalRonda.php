<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalRonda extends Model
{
    protected $table = 'jadwal_ronda';

    protected $fillable = [
        'tanggal',
        'hari',
        'rt',
        'petugas',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
        'foto',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
