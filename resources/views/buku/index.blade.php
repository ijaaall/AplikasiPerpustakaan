@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Data Buku</h1>
            <p class="text-muted mb-0">Kelola koleksi buku perpustakaan.</p>
        </div>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Tambah Data
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 70px;">No</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th class="text-center">Stok</th>
                        <th class="text-end pe-4" style="width: 190px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buku as $item)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td><span class="fw-semibold">{{ $item->kode_buku }}</span></td>
                            <td>{{ $item->judul_buku }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td class="text-center">
                                @if ($item->stok > 0)
                                    <span
                                        class="badge rounded-pill bg-success-subtle text-success-emphasis px-3">{{ $item->stok }}</span>
                                @else
                                    <span class="badge rounded-pill bg-danger-subtle text-danger-emphasis px-3">Habis</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('buku.edit', $item->id_buku) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil-square me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus data buku ini?')">
                                            <i class="bi bi-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="bi bi-journal-x fs-1 d-block mb-2"></i>
                                Belum ada data buku. Klik <strong>Tambah Data</strong> untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
