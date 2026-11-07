
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumentasi_ronda', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori', 50);
            $table->date('tanggal')->nullable();
            $table->string('foto');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumentasi_ronda');
    }
};
