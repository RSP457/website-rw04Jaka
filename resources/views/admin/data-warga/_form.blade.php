@php
    $dataWarga = $dataWarga ?? null;

    $inputClass = 'mt-1.5 w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#202536] outline-none transition focus:border-[#a91634] focus:ring-2 focus:ring-[#a91634]/10';
    $selectClass = 'mt-1.5 h-[42px] w-full rounded-lg border border-gray-300 bg-white px-3 text-sm text-[#202536] outline-none transition focus:border-[#a91634] focus:ring-2 focus:ring-[#a91634]/10';
    $labelClass = 'block text-[13px] font-bold text-[#374151]';
    $errorTextClass = 'mt-1.5 text-xs text-[#b42336]';
    $hintClass = 'mt-1.5 text-xs text-[#747b8b]';

    $agamaList = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
    $hubunganList = ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Famili Lain', 'Lainnya'];
    $perkawinanList = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
    $pendidikanList = ['Tidak/Belum Sekolah', 'SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2', 'S3'];
    $tinggalList = ['tetap' => 'Tetap', 'kontrak' => 'Kontrak', 'sementara' => 'Sementara'];
    $statusList = ['aktif' => 'Aktif', 'pindah' => 'Pindah', 'meninggal' => 'Meninggal'];

    $nilai = fn (string $field, $default = '') => old($field, $dataWarga?->{$field} ?? $default);
@endphp

@if($errors->any())
    <div class="alert alert-error">
        <strong>Periksa kembali data yang dimasukkan:</strong>
        <ul class="mt-1 list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="section">
    <form action="{{ $dataWarga ? route('admin.data-warga.update', $dataWarga) : route('admin.data-warga.store') }}"
          method="POST">

        @csrf

        @if($dataWarga)
            @method('PUT')
        @endif

        {{-- IDENTITAS --}}
        <h2 class="font-bold mb-4 border-b border-gray-100 pb-3">Identitas Warga</h2>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

            <div>
                <label for="nik" class="{{ $labelClass }}">
                    NIK <span class="text-[#b42336]">*</span>
                </label>

                <input type="text"
                       id="nik"
                       name="nik"
                       inputmode="numeric"
                       maxlength="16"
                       class="{{ $inputClass }} @error('nik') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ $nilai('nik') }}"
                       placeholder="16 digit NIK"
                       required>

                <small class="{{ $hintClass }}">Nomor Induk Kependudukan (16 digit).</small>

                @error('nik')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="no_kk" class="{{ $labelClass }}">
                    No. KK <span class="text-[#b42336]">*</span>
                </label>

                <input type="text"
                       id="no_kk"
                       name="no_kk"
                       inputmode="numeric"
                       maxlength="16"
                       class="{{ $inputClass }} @error('no_kk') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ $nilai('no_kk') }}"
                       placeholder="16 digit nomor KK"
                       required>

                @error('no_kk')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="nama_lengkap" class="{{ $labelClass }}">
                    Nama Lengkap <span class="text-[#b42336]">*</span>
                </label>

                <input type="text"
                       id="nama_lengkap"
                       name="nama_lengkap"
                       maxlength="255"
                       class="{{ $inputClass }} @error('nama_lengkap') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ $nilai('nama_lengkap') }}"
                       placeholder="Nama lengkap sesuai KTP"
                       required>

                @error('nama_lengkap')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jenis_kelamin" class="{{ $labelClass }}">
                    Jenis Kelamin <span class="text-[#b42336]">*</span>
                </label>

                <select id="jenis_kelamin"
                        name="jenis_kelamin"
                        class="{{ $selectClass }} @error('jenis_kelamin') border-[#b42336] bg-[#fff8f9] @enderror"
                        required>
                    <option value="" disabled @selected($nilai('jenis_kelamin') === '')>Pilih jenis kelamin</option>
                    <option value="L" @selected($nilai('jenis_kelamin') === 'L')>Laki-laki</option>
                    <option value="P" @selected($nilai('jenis_kelamin') === 'P')>Perempuan</option>
                </select>

                @error('jenis_kelamin')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status_hubungan" class="{{ $labelClass }}">
                    Status Hubungan <span class="text-[#b42336]">*</span>
                </label>

                @php $hubungan = $nilai('status_hubungan'); @endphp

                <select id="status_hubungan"
                        name="status_hubungan"
                        class="{{ $selectClass }} @error('status_hubungan') border-[#b42336] bg-[#fff8f9] @enderror"
                        required>
                    <option value="" disabled @selected($hubungan === '')>Pilih status hubungan</option>

                    @if($hubungan && !in_array($hubungan, $hubunganList))
                        <option value="{{ $hubungan }}" selected>{{ $hubungan }}</option>
                    @endif

                    @foreach($hubunganList as $opsi)
                        <option value="{{ $opsi }}" @selected($hubungan === $opsi)>{{ $opsi }}</option>
                    @endforeach
                </select>

                @error('status_hubungan')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tempat_lahir" class="{{ $labelClass }}">
                    Tempat Lahir <span class="text-[#b42336]">*</span>
                </label>

                <input type="text"
                       id="tempat_lahir"
                       name="tempat_lahir"
                       maxlength="100"
                       class="{{ $inputClass }} @error('tempat_lahir') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ $nilai('tempat_lahir') }}"
                       placeholder="Contoh: Jakarta"
                       required>

                @error('tempat_lahir')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_lahir" class="{{ $labelClass }}">
                    Tanggal Lahir <span class="text-[#b42336]">*</span>
                </label>

                <input type="date"
                       id="tanggal_lahir"
                       name="tanggal_lahir"
                       class="{{ $inputClass }} @error('tanggal_lahir') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ old('tanggal_lahir', $dataWarga?->tanggal_lahir?->format('Y-m-d')) }}"
                       max="{{ now()->toDateString() }}"
                       required>

                @error('tanggal_lahir')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="agama" class="{{ $labelClass }}">Agama</label>

                @php $agama = $nilai('agama'); @endphp

                <select id="agama" name="agama"
                        class="{{ $selectClass }} @error('agama') border-[#b42336] bg-[#fff8f9] @enderror">
                    <option value="">Pilih agama</option>

                    @if($agama && !in_array($agama, $agamaList))
                        <option value="{{ $agama }}" selected>{{ $agama }}</option>
                    @endif

                    @foreach($agamaList as $opsi)
                        <option value="{{ $opsi }}" @selected($agama === $opsi)>{{ $opsi }}</option>
                    @endforeach
                </select>

                @error('agama')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status_perkawinan" class="{{ $labelClass }}">Status Perkawinan</label>

                @php $perkawinan = $nilai('status_perkawinan'); @endphp

                <select id="status_perkawinan" name="status_perkawinan"
                        class="{{ $selectClass }} @error('status_perkawinan') border-[#b42336] bg-[#fff8f9] @enderror">
                    <option value="">Pilih status perkawinan</option>

                    @if($perkawinan && !in_array($perkawinan, $perkawinanList))
                        <option value="{{ $perkawinan }}" selected>{{ $perkawinan }}</option>
                    @endif

                    @foreach($perkawinanList as $opsi)
                        <option value="{{ $opsi }}" @selected($perkawinan === $opsi)>{{ $opsi }}</option>
                    @endforeach
                </select>

                @error('status_perkawinan')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="pendidikan_terakhir" class="{{ $labelClass }}">Pendidikan Terakhir</label>

                @php $pendidikan = $nilai('pendidikan_terakhir'); @endphp

                <select id="pendidikan_terakhir" name="pendidikan_terakhir"
                        class="{{ $selectClass }} @error('pendidikan_terakhir') border-[#b42336] bg-[#fff8f9] @enderror">
                    <option value="">Pilih pendidikan terakhir</option>

                    @if($pendidikan && !in_array($pendidikan, $pendidikanList))
                        <option value="{{ $pendidikan }}" selected>{{ $pendidikan }}</option>
                    @endif

                    @foreach($pendidikanList as $opsi)
                        <option value="{{ $opsi }}" @selected($pendidikan === $opsi)>{{ $opsi }}</option>
                    @endforeach
                </select>

                @error('pendidikan_terakhir')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="pekerjaan" class="{{ $labelClass }}">Pekerjaan</label>

                <input type="text"
                       id="pekerjaan"
                       name="pekerjaan"
                       maxlength="255"
                       class="{{ $inputClass }} @error('pekerjaan') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ $nilai('pekerjaan') }}"
                       placeholder="Contoh: Karyawan Swasta">

                @error('pekerjaan')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="no_hp" class="{{ $labelClass }}">No. HP</label>

                <input type="text"
                       id="no_hp"
                       name="no_hp"
                       maxlength="20"
                       class="{{ $inputClass }} @error('no_hp') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ $nilai('no_hp') }}"
                       placeholder="Contoh: 081234567890">

                @error('no_hp')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

        </div>

        {{-- ALAMAT --}}
        <h2 class="font-bold mb-4 mt-8 border-b border-gray-100 pb-3">Alamat &amp; Domisili</h2>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

            <div class="md:col-span-3">
                <label for="alamat" class="{{ $labelClass }}">
                    Alamat <span class="text-[#b42336]">*</span>
                </label>

                <textarea id="alamat"
                          name="alamat"
                          rows="3"
                          class="{{ $inputClass }} @error('alamat') border-[#b42336] bg-[#fff8f9] @enderror"
                          placeholder="Alamat lengkap tempat tinggal"
                          required>{{ $nilai('alamat') }}</textarea>

                @error('alamat')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="rt" class="{{ $labelClass }}">
                    RT <span class="text-[#b42336]">*</span>
                </label>

                <input type="text"
                       id="rt"
                       name="rt"
                       maxlength="3"
                       class="{{ $inputClass }} @error('rt') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ $nilai('rt') }}"
                       placeholder="Contoh: 001"
                       required>

                @error('rt')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="rw" class="{{ $labelClass }}">
                    RW <span class="text-[#b42336]">*</span>
                </label>

                <input type="text"
                       id="rw"
                       name="rw"
                       maxlength="3"
                       class="{{ $inputClass }} @error('rw') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ $nilai('rw', '04') }}"
                       placeholder="Contoh: 004"
                       required>

                @error('rw')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status_tinggal" class="{{ $labelClass }}">
                    Status Tinggal <span class="text-[#b42336]">*</span>
                </label>

                @php $tinggal = $nilai('status_tinggal', 'tetap'); @endphp

                <select id="status_tinggal"
                        name="status_tinggal"
                        class="{{ $selectClass }} @error('status_tinggal') border-[#b42336] bg-[#fff8f9] @enderror"
                        required>
                    @foreach($tinggalList as $value => $label)
                        <option value="{{ $value }}" @selected($tinggal === $value)>{{ $label }}</option>
                    @endforeach
                </select>

                @error('status_tinggal')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

        </div>

        {{-- STATUS KEPENDUDUKAN --}}
        <h2 class="font-bold mb-4 mt-8 border-b border-gray-100 pb-3">Status Kependudukan</h2>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

            <div>
                <label for="status_warga" class="{{ $labelClass }}">
                    Status Warga <span class="text-[#b42336]">*</span>
                </label>

                @php $statusWarga = $nilai('status_warga', 'aktif'); @endphp

                <select id="status_warga"
                        name="status_warga"
                        class="{{ $selectClass }} @error('status_warga') border-[#b42336] bg-[#fff8f9] @enderror"
                        required>
                    @foreach($statusList as $value => $label)
                        <option value="{{ $value }}" @selected($statusWarga === $value)>{{ $label }}</option>
                    @endforeach
                </select>

                @error('status_warga')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_mutasi" class="{{ $labelClass }}">Tanggal Mutasi</label>

                <input type="date"
                       id="tanggal_mutasi"
                       name="tanggal_mutasi"
                       class="{{ $inputClass }} @error('tanggal_mutasi') border-[#b42336] bg-[#fff8f9] @enderror"
                       value="{{ old('tanggal_mutasi', $dataWarga?->tanggal_mutasi?->format('Y-m-d')) }}">

                <small class="{{ $hintClass }}">
                    Diisi saat warga pindah atau meninggal (opsional).
                </small>

                @error('tanggal_mutasi')
                    <p class="{{ $errorTextClass }}">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="mt-8 flex flex-wrap items-center gap-3 border-t border-gray-100 pt-5">
            <button type="submit"
                    class="inline-flex items-center justify-center rounded-lg border border-[#a91634] bg-[#a91634] px-5 py-2.5 text-sm font-bold text-white transition hover:border-[#8d102b] hover:bg-[#8d102b]">
                {{ $dataWarga ? 'Simpan Perubahan' : 'Simpan Data Warga' }}
            </button>

            <a href="{{ route('admin.data-warga.index') }}"
               class="inline-flex items-center justify-center rounded-lg bg-[#f1f2f5] px-5 py-2.5 text-sm font-bold text-[#4b5563] transition hover:bg-[#e6e8ec]">
                Batal
            </a>
        </div>

    </form>
</section>
