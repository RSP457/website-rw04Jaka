<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataWargaRequest;
use App\Models\DataWarga;
use Illuminate\Http\Request;

class DataWargaController extends Controller
{
    public function index(Request $request)
    {
        $warga = DataWarga::cari($request->q)
            ->when(
                $request->status,
                fn($q, $s) => $q->where('status_warga', $s),
            )
            ->orderBy('nama_lengkap')
            ->paginate(10)
            ->withQueryString();

        $statistik = [
            'total'     => DataWarga::count(),
            'aktif'     => DataWarga::where('status_warga', 'aktif')->count(),
            'pindah'    => DataWarga::where('status_warga', 'pindah')->count(),
            'meninggal' => DataWarga::where('status_warga', 'meninggal')->count(),
        ];

        return view('admin.data-warga.index', compact('warga', 'statistik'));
    }

    public function create()
    {
        return view('admin.data-warga.create');
    }

    public function store(DataWargaRequest $request)
    {
        DataWarga::create($request->validated());

        return redirect()
            ->route('admin.data-warga.index')
            ->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit(DataWarga $dataWarga)
    {
        return view('admin.data-warga.edit', compact('dataWarga'));
    }

    public function update(DataWargaRequest $request, DataWarga $dataWarga)
    {
        $dataWarga->update($request->validated());

        return redirect()
            ->route('admin.data-warga.index')
            ->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(DataWarga $dataWarga)
    {
        $dataWarga->delete(); // soft delete

        return redirect()
            ->route('admin.data-warga.index')
            ->with('success', 'Data warga berhasil dihapus.');
    }
}
