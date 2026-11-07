
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalRondaController;
use App\Http\Controllers\Admin\BeritaController;

use App\Models\JadwalRonda;
use App\Models\DokumentasiRonda;


/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('beranda');


/*
|--------------------------------------------------------------------------
| TENTANG RW 04
|--------------------------------------------------------------------------
*/

Route::view('/tentang/profil-rw', 'tentang.profil-rw')
    ->name('profil-rw');

Route::view('/tentang/struktur', 'tentang.struktur')
    ->name('struktur');

Route::view('/tentang/pengurus-rt', 'tentang.pengurus-rt')
    ->name('pengurus-rt');


/*
|--------------------------------------------------------------------------
| INFORMASI RW 04 - HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/

// Daftar berita masyarakat
Route::get('/berita', [BeritaController::class, 'publicIndex'])
    ->name('berita.index');

// Detail berita berdasarkan slug
Route::get('/berita/{slug}', [BeritaController::class, 'publicShow'])
    ->name('berita.show');

// Agenda
Route::view('/agenda', 'informasi.agenda')
    ->name('agenda');

// Kas RW
Route::view('/kas-rw', 'informasi.kas-rw')
    ->name('kas-rw');

// Statistik warga
Route::view('/statistik-warga', 'informasi.statistik-warga')
    ->name('statistik-warga');


/*
|--------------------------------------------------------------------------
| KONTAK RW 04
|--------------------------------------------------------------------------
*/

// Halaman kontak utama
Route::view('/kontak', 'kontak.index')
    ->name('kontak');

// Alternatif halaman kontak lama
Route::view('/kontak/kontak', 'kontak.kontak')
    ->name('kontak.halaman');


/*
|--------------------------------------------------------------------------
| LAYANAN WARGA
|--------------------------------------------------------------------------
*/

Route::view('/layanan/administrasi', 'layanan.administrasi')
    ->name('administrasi');

Route::view('/layanan/pengaduan', 'layanan.pengaduan')
    ->name('pengaduan');

Route::view('/layanan/kegiatan', 'layanan.kegiatan')
    ->name('kegiatan');


/*
|--------------------------------------------------------------------------
| KEAMANAN WILAYAH RW 04
|--------------------------------------------------------------------------
| Menampilkan jadwal ronda dan dokumentasi foto
|--------------------------------------------------------------------------
*/

Route::get('/layanan/keamanan-wilayah', function () {

    $jadwals = JadwalRonda::orderBy('tanggal', 'asc')
        ->get();

    $dokumentasis = DokumentasiRonda::latest()
        ->get();

    return view('layanan.keamanan-wilayah', [
        'jadwals' => $jadwals,
        'dokumentasis' => $dokumentasis,
    ]);

})->name('keamanan-wilayah');


/*
|--------------------------------------------------------------------------
| FORMULIR KONTAK
|--------------------------------------------------------------------------
*/

Route::post('/kontak', function (Request $request) {

    $validated = $request->validate([

        'nama' => ['required', 'string', 'max:100'],

        'email' => ['required', 'email', 'max:150'],

        'telepon' => ['nullable', 'string', 'max:20'],

        'kategori' => [
            'required',
            'in:Pertanyaan,Saran,Pengaduan,Administrasi,Lainnya'
        ],

        'subjek' => ['required', 'string', 'max:150'],

        'pesan' => ['required', 'string', 'max:3000'],

    ]);

    // Saat ini formulir hanya divalidasi.
    // Data belum disimpan ke database.

    return back()->with(
        'success',
        'Formulir berhasil divalidasi dan diterima.'
    );

})->name('kontak.kirim');


/*
|--------------------------------------------------------------------------
| AUTENTIKASI ADMIN
|--------------------------------------------------------------------------
*/

// Halaman login
Route::get('/admin/login', [
    AuthController::class,
    'showLogin'
])->name('admin.login');

// Alias login untuk middleware auth Laravel
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Proses login
Route::post('/admin/login', [
    AuthController::class,
    'login'
])->name('admin.login.submit');

// Logout
Route::post('/admin/logout', [
    AuthController::class,
    'logout'
])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [
    DashboardController::class,
    'index'
])
    ->middleware('auth')
    ->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN - JADWAL RONDA, DOKUMENTASI DAN BERITA
|--------------------------------------------------------------------------
| Seluruh route di bawah dilindungi middleware auth.
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | CRUD JADWAL RONDA
        |--------------------------------------------------------------------------
        */

        // Menampilkan seluruh jadwal
        Route::get('/jadwal-ronda', [
            JadwalRondaController::class,
            'index'
        ])->name('admin.jadwal-ronda.index');


        // Generate jadwal ronda otomatis
        Route::post('/jadwal-ronda/generate', [
            JadwalRondaController::class,
            'generate'
        ])->name('admin.jadwal-ronda.generate');


        // Tambah jadwal
        Route::post('/jadwal-ronda', [
            JadwalRondaController::class,
            'store'
        ])->name('admin.jadwal-ronda.store');


        // Halaman edit jadwal
        Route::get('/jadwal-ronda/{jadwal}/edit', [
            JadwalRondaController::class,
            'edit'
        ])->name('admin.jadwal-ronda.edit');


        // Update jadwal
        Route::put('/jadwal-ronda/{jadwal}', [
            JadwalRondaController::class,
            'update'
        ])->name('admin.jadwal-ronda.update');


        // Hapus jadwal
        Route::delete('/jadwal-ronda/{jadwal}', [
            JadwalRondaController::class,
            'destroy'
        ])->name('admin.jadwal-ronda.destroy');


        /*
        |--------------------------------------------------------------------------
        | CRUD DOKUMENTASI RONDA
        |--------------------------------------------------------------------------
        */

        // Upload dokumentasi
        Route::post('/dokumentasi-ronda', [
            JadwalRondaController::class,
            'storeDokumentasi'
        ])->name('admin.dokumentasi-ronda.store');


        // Edit dokumentasi
        Route::put('/dokumentasi-ronda/{dokumentasi}', [
            JadwalRondaController::class,
            'updateDokumentasi'
        ])->name('admin.dokumentasi-ronda.update');


        // Hapus dokumentasi
        Route::delete('/dokumentasi-ronda/{dokumentasi}', [
            JadwalRondaController::class,
            'destroyDokumentasi'
        ])->name('admin.dokumentasi-ronda.destroy');


        /*
        |--------------------------------------------------------------------------
        | CRUD BERITA RW 04
        |--------------------------------------------------------------------------
        */

        // Daftar berita admin
        Route::get('/berita', [
            BeritaController::class,
            'index'
        ])->name('admin.berita.index');


        // Form tambah berita
        Route::get('/berita/create', [
            BeritaController::class,
            'create'
        ])->name('admin.berita.create');


        // Simpan berita
        Route::post('/berita', [
            BeritaController::class,
            'store'
        ])->name('admin.berita.store');


        // Form edit berita
        Route::get('/berita/{berita}/edit', [
            BeritaController::class,
            'edit'
        ])->name('admin.berita.edit');


        // Update berita
        Route::put('/berita/{berita}', [
            BeritaController::class,
            'update'
        ])->name('admin.berita.update');


        // Hapus berita
        Route::delete('/berita/{berita}', [
            BeritaController::class,
            'destroy'
        ])->name('admin.berita.destroy');

    });
