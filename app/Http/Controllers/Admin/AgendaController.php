<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\AgendaKategori;
use App\Http\Requests\AgendaRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    public function index(): View
    {
        $agendas = Agenda::with('kategori')
            ->when(request('q'), fn ($q, $s) => $q->where('judul', 'like', "%{$s}%"))
            ->when(request('kategori_id'), fn ($q, $id) => $q->where('kategori_id', $id))
            ->when(request('status'), fn ($q, $st) => $q->where('status', $st))
            ->orderByDesc('tanggal_mulai')
            ->paginate(10)
            ->withQueryString();

        return view('admin.agenda.index', [
            'agendas'   => $agendas,
            'kategoris' => AgendaKategori::orderBy('nama')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.agenda.create', [
            'kategoris' => AgendaKategori::orderBy('nama')->get(),
        ]);
    }

    public function store(AgendaRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $agenda = Agenda::create(
                $request->safe()->except(['lampiran', 'jenis_lampiran'])
                + ['dibuat_oleh' => $request->user()->id]
            );
            $this->simpanLampiran($request, $agenda);
        });

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dibuat.');
    }

    public function show(Agenda $agenda): View
    {
        $agenda->load(['kategori', 'pembuat', 'lampirans']);

        return view('admin.agenda.show', compact('agenda'));
    }

    public function edit(Agenda $agenda): View
    {
        return view('admin.agenda.edit', [
            'agenda'    => $agenda->load('lampirans'),
            'kategoris' => AgendaKategori::orderBy('nama')->get(),
        ]);
    }

    public function update(AgendaRequest $request, Agenda $agenda): RedirectResponse
    {
        DB::transaction(function () use ($request, $agenda) {
            $agenda->update($request->safe()->except(['lampiran', 'jenis_lampiran']));
            $this->simpanLampiran($request, $agenda);
        });

        return redirect()->route('admin.agenda.show', $agenda)->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda): RedirectResponse
    {
        $agenda->delete(); // soft delete; file lampiran tetap tersimpan

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus.');
    }

    private function simpanLampiran(AgendaRequest $request, Agenda $agenda): void
    {
        foreach ($request->file('lampiran', []) as $file) {
            $agenda->lampirans()->create([
                'file_path' => $file->store('agenda', 'public'),
                'jenis'     => $request->input('jenis_lampiran', 'lainnya'),
            ]);
        }
    }

    public function publicIndex(): View
    {
        $agendas = Agenda::publik()
            ->with(['kategori', 'lampirans'])
            ->orderBy('tanggal_mulai')
            ->paginate(9);

        return view('agenda.agenda', compact('agendas'));
    }
}
