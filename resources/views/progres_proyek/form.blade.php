<div class="form-group mb-3">
    <label for="proyek_id">Proyek</label>
    <select class="form-control @error('proyek_id') is-invalid @enderror"
            id="proyek_id" name="proyek_id">
        <option value="">-- Pilih Proyek --</option>
        @foreach($proyeks as $proyek)
            <option value="{{ $proyek->proyek_id }}"
                {{ old('proyek_id', $progres->proyek_id ?? '') == $proyek->proyek_id ? 'selected' : '' }}>
                {{ $proyek->nama_proyek }}
            </option>
        @endforeach
    </select>
    @error('proyek_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="tahap_id">Tahapan</label>
    <select class="form-control @error('tahap_id') is-invalid @enderror"
            id="tahap_id" name="tahap_id">
        <option value="">-- Pilih Tahapan --</option>
        @foreach($tahapan as $t)
            <option value="{{ $t->tahap_id }}"
                {{ old('tahap_id', $progres->tahap_id ?? '') == $t->tahap_id ? 'selected' : '' }}>
                {{ $t->nama_tahap }}
            </option>
        @endforeach
    </select>
    @error('tahap_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="persen_real">Persentase Real (%)</label>
    <input type="number" class="form-control @error('persen_real') is-invalid @enderror"
           id="persen_real" name="persen_real" step="0.01" min="0" max="100"
           value="{{ old('persen_real', $progres->persen_real ?? '') }}">
    @error('persen_real')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
           id="tanggal" name="tanggal"
           value="{{ old('tanggal', isset($progres->tanggal) ? \Illuminate\Support\Carbon::parse($progres->tanggal)->format('Y-m-d') : '') }}">
    @error('tanggal')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="catatan">Catatan</label>
    <textarea class="form-control @error('catatan') is-invalid @enderror"
              id="catatan" name="catatan" rows="3">{{ old('catatan', $progres->catatan ?? '') }}</textarea>
    @error('catatan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
