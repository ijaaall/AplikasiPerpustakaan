@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">

            <div class="mb-4">
                <h1 class="h3 fw-bold mb-1">Tambah Data Buku</h1>
                <p class="text-muted mb-0">Isi data buku baru dengan lengkap.</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('buku.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kode_buku" class="form-label fw-semibold">Kode Buku</label>
                            <input type="text" name="kode_buku" id="kode_buku" value="{{ old('kode_buku') }}"
                                class="form-control @error('kode_buku') is-invalid @enderror" placeholder="Contoh: BK-001"
                                maxlength="20" required autofocus>
                            @error('kode_buku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="judul_buku" class="form-label fw-semibold">Judul Buku</label>
                            <input type="text" name="judul_buku" id="judul_buku" value="{{ old('judul_buku') }}"
                                class="form-control @error('judul_buku') is-invalid @enderror"
                                placeholder="Judul lengkap buku" maxlength="150" required>
                            @error('judul_buku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="penulis" class="form-label fw-semibold">Penulis</label>
                            <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}"
                                class="form-control @error('penulis') is-invalid @enderror" placeholder="Nama penulis"
                                maxlength="100" required>
                            @error('penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="stok" class="form-label fw-semibold">Stok</label>
                            <input type="number" name="stok" id="stok" value="{{ old('stok') }}"
                                class="form-control @error('stok') is-invalid @enderror" placeholder="0" min="0"
                                required>
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-check-lg me-1"></i>Simpan
                            </button>
                            <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
