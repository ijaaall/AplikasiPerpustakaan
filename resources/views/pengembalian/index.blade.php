@extends('layouts.app')

@section('title', 'Data Pengembalian')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Data Pengembalian</h1>
            <p class="text-muted mb-0">Kelola data riwayat pengembalian dan denda buku perpustakaan.</p>
        </div>
        <a href="{{ route('pengembalian.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Tambah Data
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 70px;">No</th>
                        <th>Tanggal Kembali</th>
                        <th>Terlambat (Hari)</th>
                        <th>Denda</th>
                        <th class="text-end pe-4" style="width: 190px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengembalian as $item)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal_kembali }}</td>
                            <td>
                                <span
                                    class="badge rounded-pill {{ $item->terlambat_hari > 0 ? 'bg-danger-subtle text-danger-emphasis' : 'bg-success-subtle text-success-emphasis' }} px-3">
                                    {{ $item->terlambat_hari }} Hari
                                </span>
                            </td>
                            <td><span class="fw-semibold">Rp {{ number_format($item->denda, 0, ',', '.') }}</span></td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('pengembalian.edit', $item->id_pengembalian) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil-square me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('pengembalian.destroy', $item->id_pengembalian) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus data pengembalian ini?')">
                                            <i class="bi bi-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">
                                <i class="bi bi-arrow-counterclockwise fs-1 d-block mb-2"></i>
                                Belum ada data pengembalian. Klik <strong>Tambah Data</strong> untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
