<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Agenda;

class AgendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        foreach (['tanggal_mulai', 'tanggal_selesai'] as $field) {
            if (! $this->has("{$field}_tanggal") && ! $this->has("{$field}_jam")) {
                continue;
            }

            $this->merge([
                $field => $this->gabungTanggalWaktu($field),
            ]);
        }
    }

    private function gabungTanggalWaktu(string $field): ?string
    {
        $tanggal = $this->input("{$field}_tanggal");
        $jam     = $this->input("{$field}_jam");

        if (blank($tanggal) || blank($jam)) {
            return null;
        }

        return trim("{$tanggal} {$jam}");
    }

    public function rules(): array
    {
        return [
            'judul'            => ['required', 'string', 'max:255'],
            'deskripsi'        => ['nullable', 'string'],
            'tanggal_mulai'    => ['required', 'date'],
            'tanggal_selesai'  => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'lokasi'           => ['required', 'string', 'max:255'],
            'penanggung_jawab' => ['nullable', 'string', 'max:255'],
            'kategori_id'      => ['nullable', 'exists:agenda_kategoris,id'],
            'status'           => ['required', Rule::in(array_keys(Agenda::STATUS))],
            'visibilitas'      => ['required', Rule::in(['publik', 'pengurus'])],
            'lampiran'         => ['nullable', 'array'],
            'lampiran.*'       => ['file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:2048'],
            'jenis_lampiran'   => ['nullable', Rule::in(['notulen', 'foto', 'lainnya'])],
        ];
    }
}
