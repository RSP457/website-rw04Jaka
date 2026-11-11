<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DataWargaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
        {
            $id = $this->route('dataWarga')?->id;
    
            return [
                'nik'                 => ['required', 'digits:16', Rule::unique('data_warga', 'nik')->ignore($id)],
                'no_kk'               => ['required', 'digits:16'],
                'nama_lengkap'        => ['required', 'string', 'max:255'],
                'jenis_kelamin'       => ['required', 'in:L,P'],
                'tempat_lahir'        => ['required', 'string', 'max:100'],
                'tanggal_lahir'       => ['required', 'date', 'before_or_equal:today'],
                'alamat'              => ['required', 'string'],
                'rt'                  => ['required', 'string', 'max:3'],
                'rw'                  => ['required', 'string', 'max:3'],
                'status_hubungan'     => ['required', 'string', 'max:30'],
                'agama'               => ['nullable', 'string', 'max:20'],
                'status_perkawinan'   => ['nullable', 'string', 'max:20'],
                'pendidikan_terakhir' => ['nullable', 'string', 'max:30'],
                'pekerjaan'           => ['nullable', 'string', 'max:255'],
                'no_hp'               => ['nullable', 'string', 'max:20'],
                'status_tinggal'      => ['required', 'in:tetap,kontrak,sementara'],
                'status_warga'        => ['required', 'in:aktif,pindah,meninggal'],
                'tanggal_mutasi'      => ['nullable', 'date'],
            ];
        }
}
