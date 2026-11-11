<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Melengkapi kolom tabel data_warga yang belum dibuat
     * oleh migrasi create_data_warga sebelumnya.
     */
    public function up(): void
    {
        if (! Schema::hasTable('data_warga')) {
            return;
        }

        Schema::table('data_warga', function (Blueprint $table) {
            if (! Schema::hasColumn('data_warga', 'nik')) {
                $table->string('nik', 16)->unique()->after('id');
            }

            if (! Schema::hasColumn('data_warga', 'no_kk')) {
                $table->string('no_kk', 16)->index()->after('nik');
            }

            if (! Schema::hasColumn('data_warga', 'nama_lengkap')) {
                $table->string('nama_lengkap')->after('no_kk');
            }

            if (! Schema::hasColumn('data_warga', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['L', 'P'])->after('nama_lengkap');
            }

            if (! Schema::hasColumn('data_warga', 'tempat_lahir')) {
                $table->string('tempat_lahir')->after('jenis_kelamin');
            }

            if (! Schema::hasColumn('data_warga', 'tanggal_lahir')) {
                $table->date('tanggal_lahir')->after('tempat_lahir');
            }

            if (! Schema::hasColumn('data_warga', 'alamat')) {
                $table->text('alamat')->after('tanggal_lahir');
            }

            if (! Schema::hasColumn('data_warga', 'rt')) {
                $table->string('rt', 3)->after('alamat');
            }

            if (! Schema::hasColumn('data_warga', 'rw')) {
                $table->string('rw', 3)->after('rt');
            }

            if (! Schema::hasColumn('data_warga', 'status_hubungan')) {
                $table->string('status_hubungan', 30)->after('rw');
            }

            if (! Schema::hasColumn('data_warga', 'agama')) {
                $table->string('agama', 20)->nullable()->after('status_hubungan');
            }

            if (! Schema::hasColumn('data_warga', 'status_perkawinan')) {
                $table->string('status_perkawinan', 20)->nullable()->after('agama');
            }

            if (! Schema::hasColumn('data_warga', 'pendidikan_terakhir')) {
                $table->string('pendidikan_terakhir', 30)->nullable()->after('status_perkawinan');
            }

            if (! Schema::hasColumn('data_warga', 'pekerjaan')) {
                $table->string('pekerjaan')->nullable()->after('pendidikan_terakhir');
            }

            if (! Schema::hasColumn('data_warga', 'no_hp')) {
                $table->string('no_hp', 20)->nullable()->after('pekerjaan');
            }

            if (! Schema::hasColumn('data_warga', 'status_tinggal')) {
                $table->enum('status_tinggal', ['tetap', 'kontrak', 'sementara'])
                    ->default('tetap')
                    ->after('no_hp');
            }

            if (! Schema::hasColumn('data_warga', 'status_warga')) {
                $table->enum('status_warga', ['aktif', 'pindah', 'meninggal'])
                    ->default('aktif')
                    ->after('status_tinggal');
            }

            if (! Schema::hasColumn('data_warga', 'tanggal_mutasi')) {
                $table->date('tanggal_mutasi')->nullable()->after('status_warga');
            }

            if (! Schema::hasColumn('data_warga', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        // Kolom tidak dihapus agar data warga tetap aman.
    }
};
