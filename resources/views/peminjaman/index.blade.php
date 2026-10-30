@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Data Peminjaman</h1>
            <p class="text-muted mb-0">Kelola data transaksi peminjaman buku perpustakaan.</p>
        </div>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Tambah Data
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 70px;">No</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th class="text-end pe-4" style="width: 190px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peminjaman as $item)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal_peminjaman }}</td>
                            <td>{{ $item->tanggal_harus_kembali }}</td>
                            <td><span class="fw-semibold">{{ $item->anggota->nama_anggota }}</span></td>
                            <td>{{ $item->buku->judul_buku }}</td>
                            <td>{{ $item->petugas->nama_petugas }}</td>
                            <td>
                                @if ($item->status === 'Dipinjam' || $item->status === 'DiPinjam' || $item->status === 'P')
                                    <span
                                        class="badge rounded-pill bg-warning-subtle text-warning-emphasis px-3">Dipinjam</span>
                                @else
                                    <span
                                        class="badge rounded-pill bg-success-subtle text-success-emphasis px-3">Dikembalikan</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('peminjaman.edit', $item->id_peminjaman) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil-square me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('peminjaman.destroy', $item->id_peminjaman) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus data peminjaman ini?')">
                                            <i class="bi bi-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-5">
                                <i class="bi bi-journal-bookmark fs-1 d-block mb-2"></i>
                                Belum ada data peminjaman. Klik <strong>Tambah Data</strong> untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
