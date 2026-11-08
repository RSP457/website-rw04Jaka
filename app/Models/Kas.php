<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $table = 'kas';
    
        protected $fillable = ['tanggal', 'tipe', 'kategori', 'nominal', 'keterangan', 'user_id'];
    
        protected $casts = [
            'tanggal' => 'date',
            'nominal' => 'decimal:2',
        ];
    
        // Saldo total, opsional mengecualikan satu transaksi (dipakai saat edit)
        public static function saldo(?int $exceptId = null): float
        {
            $q = self::query();
            if ($exceptId) {
                $q->where('id', '!=', $exceptId);
            }
    
            $masuk  = (clone $q)->where('tipe', 'masuk')->sum('nominal');
            $keluar = (clone $q)->where('tipe', 'keluar')->sum('nominal');
    
            return $masuk - $keluar;
        }
}
