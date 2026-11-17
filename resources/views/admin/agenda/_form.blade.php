@if($errors->any())
    <div class="mb-5 rounded-lg bg-red-50 p-4 text-sm text-red-700">
        <ul class="list-inside list-disc">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-5 md:grid-cols-2">
    <label class="text-sm font-semibold text-slate-700 md:col-span-2">
        Judul agenda
        <input name="judul" required maxlength="255" value="{{ old('judul', $agenda->judul ?? '') }}" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal focus:border-[#a91634] focus:outline-none">
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Tanggal mulai
        <input type="date" name="tanggal_mulai_tanggal" required value="{{ old('tanggal_mulai_tanggal', isset($agenda) ? $agenda->tanggal_mulai->format('Y-m-d') : '') }}" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal focus:border-[#a91634] focus:outline-none">
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Jam mulai <span class="font-normal text-slate-500">(format 24 jam)</span>
        <input type="time" name="tanggal_mulai_jam" required value="{{ old('tanggal_mulai_jam', isset($agenda) ? $agenda->tanggal_mulai->format('H:i') : '') }}" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal focus:border-[#a91634] focus:outline-none">
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Tanggal selesai
        <input type="date" name="tanggal_selesai_tanggal" value="{{ old('tanggal_selesai_tanggal', isset($agenda) && $agenda->tanggal_selesai ? $agenda->tanggal_selesai->format('Y-m-d') : '') }}" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal focus:border-[#a91634] focus:outline-none">
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Jam selesai <span class="font-normal text-slate-500">(format 24 jam)</span>
        <input type="time" name="tanggal_selesai_jam" value="{{ old('tanggal_selesai_jam', isset($agenda) && $agenda->tanggal_selesai ? $agenda->tanggal_selesai->format('H:i') : '') }}" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal focus:border-[#a91634] focus:outline-none">
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Lokasi
        <input name="lokasi" required maxlength="255" value="{{ old('lokasi', $agenda->lokasi ?? '') }}" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal focus:border-[#a91634] focus:outline-none">
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Penanggung jawab
        <input name="penanggung_jawab" value="{{ old('penanggung_jawab', $agenda->penanggung_jawab ?? '') }}" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal focus:border-[#a91634] focus:outline-none">
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Kategori
        <select name="kategori_id" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal">
            <option value="">Tanpa kategori</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" @selected(old('kategori_id', $agenda->kategori_id ?? '') == $kategori->id)>{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Status
        <select name="status" required class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal">
            @foreach(\App\Models\Agenda::STATUS as $key => $label)
                <option value="{{ $key }}" @selected(old('status', $agenda->status ?? 'draft') === $key)>{{ $label }}</option>
            @endforeach
        </select>
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Visibilitas
        <select name="visibilitas" required class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal">
            <option value="publik" @selected(old('visibilitas', $agenda->visibilitas ?? 'publik') === 'publik')>Publik</option>
            <option value="pengurus" @selected(old('visibilitas', $agenda->visibilitas ?? '') === 'pengurus')>Pengurus</option>
        </select>
    </label>
    <label class="text-sm font-semibold text-slate-700 md:col-span-2">
        Deskripsi
        <textarea name="deskripsi" rows="5" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal focus:border-[#a91634] focus:outline-none">{{ old('deskripsi', $agenda->deskripsi ?? '') }}</textarea>
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Lampiran (PDF, gambar, DOC/DOCX)
        <input type="file" name="lampiran[]" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="mt-2 block w-full rounded-lg border border-slate-200 p-2 font-normal">
        <span class="mt-1 block text-xs font-normal text-slate-500">Maksimal 2 MB per file.</span>
    </label>
    <label class="text-sm font-semibold text-slate-700">
        Jenis lampiran
        <select name="jenis_lampiran" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2.5 font-normal">
            <option value="lainnya">Lainnya</option>
            <option value="notulen">Notulen</option>
            <option value="foto">Foto</option>
        </select>
    </label>
</div>

<div class="mt-6 flex flex-wrap gap-3">
    <button class="rounded-lg bg-[#a91634] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#8d102b]">{{ $submitLabel }}</button>
    <a href="{{ route('admin.agenda.index') }}" class="rounded-lg border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50">Kembali</a>
</div>
