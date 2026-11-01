@extends('layouts.app')

@section('title', 'Tambah Data Pengembalian')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <div class="mb-4">
                    <h1 class="h3 fw-bold mb-1">Tambah Data Pengembalian</h1>
                    <p class="text-muted mb-0">Catat pengembalian buku, keterlambatan dan denda akan dihitung otomatis.</p>
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

                <form action="{{ route('pengembalian.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="id_peminjaman" class="form-label fw-semibold">Pilih Peminjaman (Buku & Anggota)</label>
                        <select name="id_peminjaman" id="id_peminjaman" class="form-select" required>
                            <option value="">-- Pilih Data Peminjaman --</option>
                            @foreach ($peminjaman as $item)
                                <option value="{{ $item->id_peminjaman }}"
                                    {{ old('id_peminjaman') == $item->id_peminjaman ? 'selected' : '' }}>
                                    ID: {{ $item->id_peminjaman }} - {{ $item->buku->judul_buku ?? 'Buku' }} (Anggota:
                                    {{ $item->anggota->nama_anggota ?? 'Anggota' }}) | Harus Kembali:
                                    {{ $item->tanggal_harus_kembali }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_kembali" class="form-label fw-semibold">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control"
                            value="{{ old('tanggal_kembali', date('Y-m-d')) }}" readonly required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Simpan & Hitung Otomatis
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
