@extends('layouts.app')

@section('title', 'Data Petugas')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Data Petugas</h1>
            <p class="text-muted mb-0">Kelola data petugas perpustakaan.</p>
        </div>
        <a href="{{ route('petugas.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Tambah Data
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 70px;">No</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Jabatan</th>
                        <th class="text-end pe-4" style="width: 190px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($petugas as $data)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td><span class="fw-semibold">{{ $data->nama_petugas }}</span></td>
                            <td><span class="text-muted">&#64;</span>{{ $data->username }}</td>
                            <td>
                                <span
                                    class="badge rounded-pill bg-primary-subtle text-primary-emphasis px-3">{{ $data->jabatan }}</span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('petugas.edit', $data->id_petugas) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil-square me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('petugas.destroy', $data->id_petugas) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus data petugas ini?')">
                                            <i class="bi bi-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">
                                <i class="bi bi-person-badge fs-1 d-block mb-2"></i>
                                Belum ada data petugas. Klik <strong>Tambah Data</strong> untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
