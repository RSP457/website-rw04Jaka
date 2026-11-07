<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{
    Schema::table('jadwal_ronda', function (Blueprint $table) {
        $table->date('tanggal')->unique();
        $table->string('hari', 20);
        $table->string('rt', 10);
        $table->string('petugas')->nullable();
        $table->time('jam_mulai')->default('22:00:00');
        $table->time('jam_selesai')->default('04:00:00');
        $table->text('keterangan')->nullable();
    });
}

public function down(): void
{
    Schema::table('jadwal_ronda', function (Blueprint $table) {
        $table->dropUnique(['tanggal']);

        $table->dropColumn([
            'tanggal',
            'hari',
            'rt',
            'petugas',
            'jam_mulai',
            'jam_selesai',
            'keterangan',
        ]);
    });
}

};
