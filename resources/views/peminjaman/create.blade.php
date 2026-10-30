@extends('layouts.app')

@section('title', 'Tambah Data Peminjaman')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <div class="mb-4">
                    <h1 class="h3 fw-bold mb-1">Tambah Data Peminjaman</h1>
                    <p class="text-muted mb-0">Catat transaksi peminjaman buku baru ke sistem.</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="tanggal_peminjaman" class="form-label fw-semibold">Tanggal Peminjaman</label>
                        <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control"
                            value="{{ old('tanggal_peminjaman') }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_harus_kembali" class="form-label fw-semibold">Tanggal Harus Kembali</label>
                        <input type="date" name="tanggal_harus_kembali" id="tanggal_harus_kembali" class="form-control"
                            value="{{ old('tanggal_harus_kembali') }}">
                    </div>

                    <div class="mb-3">
                        <label for="id_anggota" class="form-label fw-semibold">Anggota</label>
                        <select name="id_anggota" id="id_anggota" class="form-select">
                            <option value="">-- Pilih Anggota --</option>
                            @foreach ($anggota as $item)
                                <option value="{{ $item->id_anggota }}"
                                    {{ old('id_anggota') == $item->id_anggota ? 'selected' : '' }}>
                                    {{ $item->nama_anggota }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_buku" class="form-label fw-semibold">Buku</label>
                        <select name="id_buku" id="id_buku" class="form-select">
                            <option value="">-- Pilih Buku --</option>
                            @foreach ($buku as $item)
                                <option value="{{ $item->id_buku }}"
                                    {{ old('id_buku') == $item->id_buku ? 'selected' : '' }}>
                                    {{ $item->judul_buku }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_petugas" class="form-label fw-semibold">Petugas</label>
                        <select name="id_petugas" id="id_petugas" class="form-select">
                            <option value="">-- Pilih Petugas --</option>
                            @foreach ($petugas as $item)
                                <option value="{{ $item->id_petugas }}"
                                    {{ old('id_petugas') == $item->id_petugas ? 'selected' : '' }}>
                                    {{ $item->nama_petugas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold d-block">Status</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" id="status_dipinjam" value="Dipinjam"
                                class="form-check-input"
                                {{ old('status') == 'Dipinjam' || old('status') == 'DiPinjam' ? 'checked' : '' }}>
                            <label for="status_dipinjam" class="form-check-label">Dipinjam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" id="status_kembali" value="Dikembalikan"
                                class="form-check-input"
                                {{ old('status') == 'Dikembalikan' || old('status') == 'diKembalikan' ? 'checked' : '' }}>
                            <label for="status_kembali" class="form-check-label">Dikembalikan</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
