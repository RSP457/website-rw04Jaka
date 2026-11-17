<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AgendaKategori extends Model
{
    protected $fillable = ['nama'];

    public function agendas(): HasMany
    {
        return $this->hasMany(Agenda::class, 'kategori_id');
    }
}
