@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">

            <div class="mb-4">
                <h1 class="h3 fw-bold mb-1">Edit Data Anggota</h1>
                <p class="text-muted mb-0">Perbarui data anggota, lalu simpan perubahan.</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nisn" class="form-label fw-semibold">NISN</label>
                            <input type="text" name="nisn" id="nisn" value="{{ old('nisn', $anggota->nisn) }}"
                                class="form-control @error('nisn') is-invalid @enderror" pattern="[0-9]{10}"
                                title="NISN harus 10 digit angka" inputmode="numeric" maxlength="10"
                                placeholder="Masukkan 10 digit angka" required autofocus>
                            @error('nisn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_anggota" class="form-label fw-semibold">Nama Anggota</label>
                            <input type="text" name="nama_anggota" id="nama_anggota"
                                value="{{ old('nama_anggota', $anggota->nama_anggota) }}"
                                class="form-control @error('nama_anggota') is-invalid @enderror" maxlength="100" required>
                            @error('nama_anggota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @php
                            $jk = old('jenis_kelamin', $anggota->jenis_kelamin);
                        @endphp
                        <div class="mb-3">
                            <label class="form-label fw-semibold d-block">Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                    name="jenis_kelamin" id="jk_l" value="L" {{ $jk === 'L' ? 'checked' : '' }}
                                    required>
                                <label for="jk_l" class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                    name="jenis_kelamin" id="jk_p" value="P" {{ $jk === 'P' ? 'checked' : '' }}>
                                <label for="jk_p" class="form-check-label">Perempuan</label>
                            </div>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="kelas" class="form-label fw-semibold">Kelas</label>
                            <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $anggota->kelas) }}"
                                class="form-control @error('kelas') is-invalid @enderror" maxlength="20"
                                placeholder="Contoh: XII PPLG 1" required>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-check-lg me-1"></i>Update
                            </button>
                            <a href="{{ route('anggota.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
