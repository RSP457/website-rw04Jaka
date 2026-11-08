<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kas;

class KasController extends Controller
{
    /**
     * Halaman publik informasi kas RW.
     */
    public function publicIndex(Request $request)
    {
        [$kas, $totalMasuk, $totalKeluar] = $this->data($request);

        return view('informasi.kas-rw', [
            'kas'         => $kas,
            'totalMasuk'  => $totalMasuk,
            'totalKeluar' => $totalKeluar,
            'saldo'       => $totalMasuk - $totalKeluar,
            'bulan'       => $this->bulanFilter($request),
        ]);
    }

    /**
     * Admin - daftar transaksi kas.
     */
    public function index(Request $request)
    {
        [$kas, $totalMasuk, $totalKeluar] = $this->data($request);

        return view('admin.kas.index', [
            'kas'         => $kas,
            'totalMasuk'  => $totalMasuk,
            'totalKeluar' => $totalKeluar,
            'saldo'       => $totalMasuk - $totalKeluar,
            'bulan'       => $this->bulanFilter($request),
        ]);
    }

    public function create()
    {
        return view('admin.kas.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($data['tipe'] === 'keluar' && $data['nominal'] > Kas::saldo()) {
            return back()->withInput()->withErrors(['nominal' => 'Saldo tidak mencukupi.']);
        }   

        Kas::create($data + ['user_id' => auth()->id()]);

        return redirect()
            ->route('admin.kas.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit(Kas $kas)
    {
        return view('admin.kas.edit', compact('kas'));
    }

    public function update(Request $request, Kas $kas)
    {
        $data = $this->validated($request);

        // Saldo tanpa transaksi ini, lalu cek apakah hasil edit membuat saldo minus
        $saldoLain = Kas::saldo($kas->id);
        $saldoBaru = $data['tipe'] === 'masuk'
            ? $saldoLain + $data['nominal']
            : $saldoLain - $data['nominal'];

        if ($saldoBaru < 0) {
            return back()->withInput()->withErrors(['nominal' => 'Perubahan ini membuat saldo menjadi minus.']);
        }

        $kas->update($data);

        return redirect()
            ->route('admin.kas.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Kas $kas)
    {
        // Jangan hapus pemasukan jika saldo akan jadi minus
        if ($kas->tipe === 'masuk' && Kas::saldo($kas->id) < 0) {
            return back()->withErrors('Transaksi tidak dapat dihapus karena saldo akan menjadi minus.');
        }

        $kas->delete();

        return redirect()
            ->route('admin.kas.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }

    /**
     * Query kas beserta total pemasukan dan pengeluaran.
     * Mendukung filter bulan dengan format YYYY-MM.
     */
    private function data(Request $request): array
    {
        $query = Kas::query()->orderByDesc('tanggal')->orderByDesc('id');

        $bulan = $this->bulanFilter($request);

        if ($bulan) {
            [$tahun, $bulanAngka] = explode('-', $bulan);
            $query->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulanAngka);
        }

        $totalMasuk  = (float) (clone $query)->where('tipe', 'masuk')->sum('nominal');
        $totalKeluar = (float) (clone $query)->where('tipe', 'keluar')->sum('nominal');

        $kas = $query->paginate(10)->withQueryString();

        return [$kas, $totalMasuk, $totalKeluar];
    }

    /**
     * Ambil filter bulan yang valid (format YYYY-MM), atau null.
     */
    private function bulanFilter(Request $request): ?string
    {
        $bulan = $request->input('bulan');

        if (is_string($bulan) && preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $bulan)) {
            return $bulan;
        }

        return null;
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'tanggal'    => 'required|date',
            'tipe'       => 'required|in:masuk,keluar',
            'kategori'   => 'required|string|max:100',
            'nominal'    => 'required|numeric|min:1',
            'keterangan' => 'nullable|string|max:500',
        ]);
    }
}
