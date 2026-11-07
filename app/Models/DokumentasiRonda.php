<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumentasiRonda extends Model
{
    protected $table = 'dokumentasi_ronda';

    protected $fillable = [
        'judul',
        'kategori',
        'tanggal',
        'foto',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
