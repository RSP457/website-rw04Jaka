<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataWarga extends Model
{
    use HasFactory, SoftDeletes;
   
    protected $table = 'data_warga';

    protected $fillable = [
        'nik', 'no_kk', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir',
        'tanggal_lahir', 'alamat', 'rt', 'rw', 'status_hubungan', 'agama',
        'status_perkawinan', 'pendidikan_terakhir', 'pekerjaan', 'no_hp',
        'status_tinggal', 'status_warga', 'tanggal_mutasi',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir'  => 'date',
            'tanggal_mutasi' => 'date',
        ];
    }

    public function scopeCari($query, ?string $keyword)
    {
        return $query->when($keyword, function ($q) use ($keyword) {
            $q->where(function ($q) use ($keyword) {
                $q->where('nama_lengkap', 'like', "%{$keyword}%")
                  ->orWhere('nik', 'like', "%{$keyword}%")
                  ->orWhere('no_kk', 'like', "%{$keyword}%");
            });
        });
    }
}
