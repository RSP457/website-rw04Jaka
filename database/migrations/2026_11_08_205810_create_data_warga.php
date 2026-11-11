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
        // Tabel data_warga sudah dibuat oleh migrasi sebelumnya.
        // Kolom yang belum lengkap ditambahkan oleh migrasi berikutnya.
        if (Schema::hasTable('data_warga')) {
            return;
        }

        Schema::create('data_warga', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('no_kk', 16)->index();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('status_hubungan', 30);
            $table->string('agama', 20)->nullable();
            $table->string('status_perkawinan', 20)->nullable();
            $table->string('pendidikan_terakhir', 30)->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->enum('status_tinggal', ['tetap', 'kontrak', 'sementara'])->default('tetap');
            $table->enum('status_warga', ['aktif', 'pindah', 'meninggal'])->default('aktif');
            $table->date('tanggal_mutasi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_warga');
    }
};
