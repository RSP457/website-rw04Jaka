<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai')->nullable();
            $table->string('lokasi');
            $table->string('penanggung_jawab')->nullable();
            $table->foreignId('kategori_id')->nullable()
                  ->constrained('agenda_kategoris')->nullOnDelete();
            $table->enum('status', [
                'draft', 'menunggu_persetujuan', 'terjadwal',
                'berlangsung', 'selesai', 'dibatalkan', 'ditunda',
            ])->default('draft');
            $table->enum('visibilitas', ['publik', 'pengurus'])->default('publik');
            $table->foreignId('dibuat_oleh')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['tanggal_mulai', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
