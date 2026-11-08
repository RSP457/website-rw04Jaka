<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BeritaController extends Controller
{
    /**
     * ADMIN - DAFTAR BERITA
     */
    public function index()
    {
        $beritas = Berita::latest()
            ->paginate(10);

        return view('admin.berita.index', compact('beritas'));
    }

    /**
     * ADMIN - FORM TAMBAH BERITA
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * ADMIN - SIMPAN BERITA
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:200',
            ],

            'ringkasan' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'isi' => [
                'required',
                'string',
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'tanggal_publikasi' => [
                'nullable',
                'date',
            ],

            'status' => [
                'required',
                Rule::in(['draft', 'terbit']),
            ],
        ]);

        // Membuat slug otomatis dan unik
        $slugDasar = Str::slug($validated['judul']);
        $slug = $slugDasar;
        $nomor = 1;

        while (Berita::where('slug', $slug)->exists()) {
            $slug = $slugDasar . '-' . $nomor;
            $nomor++;
        }

        $validated['slug'] = $slug;

        // Upload foto kegiatan
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        // Mengisi tanggal otomatis jika berita diterbitkan
        if (
            $validated['status'] === 'terbit' &&
            empty($validated['tanggal_publikasi'])
        ) {
            $validated['tanggal_publikasi'] = today()->toDateString();
        }

        // Menyimpan ke database
        Berita::create($validated);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * ADMIN - FORM EDIT BERITA
     */
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * ADMIN - UPDATE BERITA
     */
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:200',
            ],

            'ringkasan' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'isi' => [
                'required',
                'string',
            ],

            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'tanggal_publikasi' => [
                'nullable',
                'date',
            ],

            'status' => [
                'required',
                Rule::in(['draft', 'terbit']),
            ],
        ]);

        // Perbarui slug jika judul berubah
        if ($berita->judul !== $validated['judul']) {

            $slugDasar = Str::slug($validated['judul']);
            $slug = $slugDasar;
            $nomor = 1;

            while (
                Berita::where('slug', $slug)
                    ->where('id', '!=', $berita->id)
                    ->exists()
            ) {
                $slug = $slugDasar . '-' . $nomor;
                $nomor++;
            }

            $validated['slug'] = $slug;
        }

        // Simpan lokasi gambar lama
        $gambarLama = $berita->gambar;

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {

            $gambarBaru = $request->file('gambar')
                ->store('berita', 'public');

            if (!$gambarBaru) {
                return back()
                    ->withInput()
                    ->with('error', 'Gagal mengupload gambar baru!');
            }

            $validated['gambar'] = $gambarBaru;
        }

        // Tanggal otomatis saat pertama kali diterbitkan
        if (
            $validated['status'] === 'terbit' &&
            empty($validated['tanggal_publikasi'])
        ) {
            $validated['tanggal_publikasi'] = today()->toDateString();
        }

        // Update database
        $berita->update($validated);

        // Hapus gambar lama setelah database berhasil diperbarui
        if (
            $request->hasFile('gambar') &&
            $gambarLama &&
            $gambarLama !== $berita->gambar
        ) {
            Storage::disk('public')->delete($gambarLama);
        }

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * ADMIN - HAPUS BERITA
     */
    public function destroy(Berita $berita)
    {
        // Hapus foto dari storage
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Hapus data berita
        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }

    /**
     * PUBLIK - DAFTAR BERITA
     */
    public function publicIndex()
    {
        $beritas = $this->publishedQuery()
            ->orderByDesc('tanggal_publikasi')
            ->orderByDesc('created_at')
            ->paginate(9);

        return view('informasi.berita', compact('beritas'));
    }

    /**
     * PUBLIK - DETAIL BERITA
     */
    public function publicShow($slug)
    {
        $berita = $this->publishedQuery()
            ->where('slug', $slug)
            ->firstOrFail();

        return view(
            'informasi.detail-berita',
            compact('berita')
        );
    }

    /**
     * Query berita yang boleh tampil di halaman publik:
     * status sudah "terbit" dan tanggal publikasi tidak melewati hari ini.
     */
    private function publishedQuery()
    {
        return Berita::query()
            ->where('status', 'terbit')
            ->where(function ($query) {
                $query->whereNull('tanggal_publikasi')
                    ->orWhereDate(
                        'tanggal_publikasi',
                        '<=',
                        today()->toDateString()
                    );
            });
    }
}
