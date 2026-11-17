<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use SoftDeletes;

    public const STATUS = [
        'draft'                => 'Draft',
        'menunggu_persetujuan' => 'Menunggu Persetujuan',
        'terjadwal'            => 'Terjadwal',
        'berlangsung'          => 'Berlangsung',
        'selesai'              => 'Selesai',
        'dibatalkan'           => 'Dibatalkan',
        'ditunda'              => 'Ditunda',
    ];

    protected $fillable = [
        'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'lokasi',
        'penanggung_jawab', 'kategori_id', 'status', 'visibilitas', 'dibuat_oleh',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'datetime',
        'tanggal_selesai' => 'datetime',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(AgendaKategori::class, 'kategori_id');
    }

    public function pembuat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function lampirans(): HasMany
    {
        return $this->hasMany(AgendaLampiran::class);
    }

    public function scopePublik($query)
    {
        return $query->where('visibilitas', 'publik')
                     ->whereIn('status', ['terjadwal', 'berlangsung', 'selesai']);
    }

    public function scopeMendatang($query)
    {
        return $query->where('tanggal_mulai', '>=', now())->orderBy('tanggal_mulai');
    }
}
