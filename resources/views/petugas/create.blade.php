@extends('layouts.app')

@section('title', 'Tambah Petugas')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">

            <div class="mb-4">
                <h1 class="h3 fw-bold mb-1">Tambah Data Petugas</h1>
                <p class="text-muted mb-0">Isi data petugas baru dengan lengkap.</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('petugas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_petugas" class="form-label fw-semibold">Nama Petugas</label>
                            <input type="text" name="nama_petugas" id="nama_petugas" value="{{ old('nama_petugas') }}"
                                class="form-control @error('nama_petugas') is-invalid @enderror" maxlength="100"
                                placeholder="Nama lengkap petugas" required autofocus>
                            @error('nama_petugas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                                class="form-control @error('username') is-invalid @enderror" maxlength="50"
                                placeholder="Username unik" autocomplete="off" required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}"
                                class="form-control @error('jabatan') is-invalid @enderror" list="daftar-jabatan"
                                maxlength="50" placeholder="Contoh: Staf" required>
                            <datalist id="daftar-jabatan">
                                <option value="Kepala Perpustakaan">
                                <option value="Staf">
                            </datalist>
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-check-lg me-1"></i>Simpan
                            </button>
                            <a href="{{ route('petugas.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
