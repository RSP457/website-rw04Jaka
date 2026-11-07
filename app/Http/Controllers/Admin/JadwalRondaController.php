<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalRonda;
use App\Models\DokumentasiRonda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JadwalRondaController extends Controller
{
    // HALAMAN ADMIN
    public function index()
    {
        $jadwals = JadwalRonda::orderBy('tanggal')->get();

        $dokumentasis = DokumentasiRonda::latest()->get();

        $totalJadwal = $jadwals->count();

        $totalDokumentasi = $dokumentasis->count();

        $totalRT = $jadwals->pluck('rt')->unique()->count();

        return view('admin.jadwal-ronda.index', compact(
            'jadwals',
            'dokumentasis',
            'totalJadwal',
            'totalDokumentasi',
            'totalRT'
        ));
    }

    // GENERATE OTOMATIS ROLLING 11 RT
    public function generate(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'jumlah_minggu' => 'required|integer|min:1|max:52',
        ]);

        $tanggal = Carbon::parse($request->tanggal_mulai)->startOfDay();

        while ($tanggal->dayOfWeek !== Carbon::FRIDAY) {
            $tanggal->addDay();
        }

        $namaHari = [
            Carbon::FRIDAY => 'Jumat',
            Carbon::SATURDAY => 'Sabtu',
        ];

        $nomorRT = 1;
        $jumlahBaru = 0;

        DB::transaction(function () use (
            $tanggal,
            $request,
            $namaHari,
            &$nomorRT,
            &$jumlahBaru
        ) {
            for ($minggu = 0; $minggu < $request->jumlah_minggu; $minggu++) {

                $jumat = $tanggal->copy()->addWeeks($minggu);

                $sabtu = $jumat->copy()->addDay();

                foreach ([$jumat, $sabtu] as $hari) {

                    $rt = 'RT ' . str_pad($nomorRT, 2, '0', STR_PAD_LEFT);

                    $data = JadwalRonda::firstOrCreate(
                        [
                            'tanggal' => $hari->toDateString(),
                        ],
                        [
                            'hari' => $namaHari[$hari->dayOfWeek],
                            'rt' => $rt,
                            'petugas' => null,
                            'jam_mulai' => '22:00:00',
                            'jam_selesai' => '04:00:00',
                            'keterangan' => 'Kegiatan ronda malam RW 04.',
                        ]
                    );

                    if ($data->wasRecentlyCreated) {
                        $jumlahBaru++;
                    }

                    $nomorRT++;

                    if ($nomorRT > 11) {
                        $nomorRT = 1;
                    }
                }
            }
        });

        return redirect()
            ->route('admin.jadwal-ronda.index')
            ->with('success', $jumlahBaru . ' jadwal berhasil dibuat.');
    }

    // TAMBAH JADWAL
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date|unique:jadwal_ronda,tanggal',
            'rt' => 'required|in:RT 01,RT 02,RT 03,RT 04,RT 05,RT 06,RT 07,RT 08,RT 09,RT 10,RT 11',
            'petugas' => 'nullable|string|max:255',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'nullable|string|max:2000',
        ]);

        $validated['hari'] = Carbon::parse($validated['tanggal'])
            ->locale('id')->isoFormat('dddd');

        JadwalRonda::create($validated);

        return back()->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // EDIT JADWAL
    public function edit(JadwalRonda $jadwal)
    {
        return view('admin.jadwal-ronda.edit', compact('jadwal'));
    }

    // UPDATE JADWAL
    public function update(Request $request, JadwalRonda $jadwal)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date|unique:jadwal_ronda,tanggal,' . $jadwal->id,
            'rt' => 'required|in:RT 01,RT 02,RT 03,RT 04,RT 05,RT 06,RT 07,RT 08,RT 09,RT 10,RT 11',
            'petugas' => 'nullable|string|max:255',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'nullable|string|max:2000',
        ]);

        $validated['hari'] = Carbon::parse($validated['tanggal'])
            ->locale('id')->isoFormat('dddd');

        $jadwal->update($validated);

        return redirect()
            ->route('admin.jadwal-ronda.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    // HAPUS JADWAL
    public function destroy(JadwalRonda $jadwal)
    {
        $jadwal->delete();

        return back()->with('success', 'Jadwal berhasil dihapus.');
    }

    // UPLOAD DOKUMENTASI
    public function storeDokumentasi(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'kategori' => 'required|in:Petugas Keamanan,Kegiatan Ronda,Patroli,Pos Ronda',
            'tanggal' => 'nullable|date',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'keterangan' => 'nullable|string|max:2000',
        ]);

        $validated['foto'] = $request->file('foto')
            ->store('dokumentasi-ronda', 'public');

        DokumentasiRonda::create($validated);

        return back()->with('success', 'Foto berhasil diupload.');
    }

    // UPDATE DOKUMENTASI
    public function updateDokumentasi(
        Request $request,
        DokumentasiRonda $dokumentasi
    ) {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'kategori' => 'required|in:Petugas Keamanan,Kegiatan Ronda,Patroli,Pos Ronda',
            'tanggal' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'keterangan' => 'nullable|string|max:2000',
        ]);

        if ($request->hasFile('foto')) {

            Storage::disk('public')->delete($dokumentasi->foto);

            $validated['foto'] = $request->file('foto')
                ->store('dokumentasi-ronda', 'public');
        }

        $dokumentasi->update($validated);

        return back()->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    // HAPUS DOKUMENTASI
    public function destroyDokumentasi(DokumentasiRonda $dokumentasi)
    {
        Storage::disk('public')->delete($dokumentasi->foto);

        $dokumentasi->delete();

        return back()->with('success', 'Dokumentasi berhasil dihapus.');
    }

    // HALAMAN PUBLIK
    public function publicIndex()
    {
        $jadwals = JadwalRonda::whereDate('tanggal', '>=', today())
            ->orderBy('tanggal')
            ->get();

        $dokumentasis = DokumentasiRonda::latest()->get();

        return view('layanan.keamanan-wilayah', compact(
            'jadwals',
            'dokumentasis'
        ));
    }
}
