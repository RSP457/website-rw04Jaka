@php
    $kas = $kas ?? null;
    $tipeTerpilih = old('tipe', $kas->tipe ?? 'masuk');
    $saldoTersedia = $kas ? \App\Models\Kas::saldo($kas->id) : \App\Models\Kas::saldo();
@endphp

<style>
    .kas-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 14px;
        color: #747b8b;
        font-size: 13px;
        text-decoration: none;
    }

    .kas-back:hover {
        color: #a91634;
    }

    .kas-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 15px;
    }

    .kas-form-group {
        min-width: 0;
    }

    .kas-form-group > label {
        display: block;
        color: #374151;
        font-size: 13px;
        font-weight: 700;
    }

    .kas-form-group > label span {
        color: #b42336;
    }

    .kas-form-control.is-invalid {
        border-color: #b42336;
        background: #fff8f9;
    }

    .kas-form-hint {
        display: block;
        margin-top: -9px;
        margin-bottom: 15px;
        color: #747b8b;
        font-size: 11px;
        line-height: 1.6;
    }

    .kas-form-error {
        margin-top: -9px;
        margin-bottom: 15px;
        color: #b42336;
        font-size: 12px;
    }

    .kas-currency {
        display: flex;
        align-items: stretch;
        margin-top: 7px;
        margin-bottom: 15px;
    }

    .kas-currency span {
        display: flex;
        align-items: center;
        padding: 0 14px;
        border: 1px solid #ddd;
        border-right: none;
        border-radius: 7px 0 0 7px;
        background: #f7f7f9;
        color: #747b8b;
        font-size: 13px;
        font-weight: 700;
    }

    .kas-currency .form-control {
        margin: 0;
        border-radius: 0 7px 7px 0;
    }

    .kas-form-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 8px;
        padding-top: 18px;
        border-top: 1px solid #eee;
    }

    .kas-form-actions .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 18px;
        border: none;
        border-radius: 7px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: .2s;
    }

    .kas-form-actions .btn-primary {
        background: #a91634;
        color: #fff;
    }

    .kas-form-actions .btn-primary:hover {
        background: #8d102b;
    }

    .kas-form-actions .btn-reset {
        background: #f1f2f5;
        color: #4b5563;
    }

    .kas-form-actions .btn-reset:hover {
        background: #e6e8ec;
    }

    @media (max-width: 700px) {
        .kas-form-grid {
            grid-template-columns: 1fr;
        }

        .kas-form-actions .btn {
            flex: 1 1 100%;
        }
    }
</style>

@if($errors->any())
    <div class="alert alert-error">
        <strong>Periksa kembali data yang dimasukkan:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="section">
    <form action="{{ $kas ? route('admin.kas.update', $kas) : route('admin.kas.store') }}"
          method="POST">

        @csrf

        @if($kas)
            @method('PUT')
        @endif

        <div class="kas-form-grid">

            {{-- TANGGAL --}}
            <div class="kas-form-group">
                <label for="tanggal">
                    Tanggal <span>*</span>
                </label>

                <input type="date"
                       id="tanggal"
                       name="tanggal"
                       class="form-control @error('tanggal') is-invalid @enderror"
                       value="{{ old('tanggal', $kas ? $kas->tanggal->format('Y-m-d') : now()->toDateString()) }}"
                       required>

                @error('tanggal')
                    <div class="kas-form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- TIPE --}}
            <div class="kas-form-group">
                <label for="tipe">
                    Tipe Transaksi <span>*</span>
                </label>

                <select id="tipe"
                        name="tipe"
                        class="form-control @error('tipe') is-invalid @enderror"
                        required>

                    <option value="masuk" @selected($tipeTerpilih === 'masuk')>
                        Pemasukan
                    </option>

                    <option value="keluar" @selected($tipeTerpilih === 'keluar')>
                        Pengeluaran
                    </option>

                </select>

                @error('tipe')
                    <div class="kas-form-error">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="kas-form-grid">

            {{-- KATEGORI --}}
            <div class="kas-form-group">
                <label for="kategori">
                    Kategori <span>*</span>
                </label>

                <input type="text"
                       id="kategori"
                       name="kategori"
                       list="kas-kategori-list"
                       maxlength="100"
                       class="form-control @error('kategori') is-invalid @enderror"
                       value="{{ old('kategori', $kas->kategori ?? '') }}"
                       placeholder="Contoh: Iuran Warga"
                       required>

                <datalist id="kas-kategori-list">
                    <option value="Iuran Warga"></option>
                    <option value="Donasi"></option>
                    <option value="Kegiatan RW"></option>
                    <option value="Kebersihan"></option>
                    <option value="Keamanan"></option>
                    <option value="Operasional"></option>
                    <option value="Lainnya"></option>
                </datalist>

                @error('kategori')
                    <div class="kas-form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- NOMINAL --}}
            <div class="kas-form-group">
                <label for="nominal">
                    Nominal <span>*</span>
                </label>

                <div class="kas-currency">
                    <span>Rp</span>

                    <input type="number"
                           id="nominal"
                           name="nominal"
                           min="1"
                           step="0.01"
                           class="form-control @error('nominal') is-invalid @enderror"
                           value="{{ old('nominal', $kas->nominal ?? '') }}"
                           placeholder="0"
                           required>
                </div>

                <small class="kas-form-hint">
                    Saldo kas tersedia:
                    <strong>Rp {{ number_format($saldoTersedia, 0, ',', '.') }}</strong>
                </small>

                @error('nominal')
                    <div class="kas-form-error">{{ $message }}</div>
                @enderror
            </div>

        </div>

        {{-- KETERANGAN --}}
        <div class="kas-form-group">
            <label for="keterangan">
                Keterangan
            </label>

            <textarea id="keterangan"
                      name="keterangan"
                      rows="4"
                      maxlength="500"
                      class="form-control @error('keterangan') is-invalid @enderror"
                      placeholder="Tambahkan keterangan transaksi (opsional)">{{ old('keterangan', $kas->keterangan ?? '') }}</textarea>

            @error('keterangan')
                <div class="kas-form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="kas-form-actions">
            <button type="submit" class="btn btn-primary">
                {{ $kas ? 'Simpan Perubahan' : 'Simpan Transaksi' }}
            </button>

            <a href="{{ route('admin.kas.index') }}" class="btn btn-reset">
                Batal
            </a>
        </div>

    </form>
</section>
