<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgendaLampiran extends Model
{
    protected $fillable = ['agenda_id', 'file_path', 'jenis'];

    public function agenda(): BelongsTo
    {
        return $this->belongsTo(Agenda::class);
    }
}
