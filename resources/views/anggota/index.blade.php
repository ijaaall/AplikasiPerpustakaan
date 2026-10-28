@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Data Anggota</h1>
            <p class="text-muted mb-0">Kelola data siswa yang terdaftar sebagai anggota perpustakaan.</p>
        </div>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Tambah Data
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 70px;">No</th>
                        <th>NISN</th>
                        <th>Nama Anggota</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th class="text-end pe-4" style="width: 190px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anggota as $item)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td><span class="fw-semibold">{{ $item->nisn }}</span></td>
                            <td>{{ $item->nama_anggota }}</td>
                            <td>
                                @if ($item->jenis_kelamin === 'L')
                                    <span
                                        class="badge rounded-pill bg-primary-subtle text-primary-emphasis px-3">Laki-laki</span>
                                @else
                                    <span
                                        class="badge rounded-pill bg-warning-subtle text-warning-emphasis px-3">Perempuan</span>
                                @endif
                            </td>
                            <td>{{ $item->kelas }}</td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('anggota.edit', $item->id_anggota) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil-square me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('anggota.destroy', $item->id_anggota) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus data anggota ini?')">
                                            <i class="bi bi-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="bi bi-people fs-1 d-block mb-2"></i>
                                Belum ada data anggota. Klik <strong>Tambah Data</strong> untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
