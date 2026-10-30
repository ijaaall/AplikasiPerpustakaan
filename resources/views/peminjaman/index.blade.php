@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
    <div class="container">
        <h2>Data Peminjaman</h2>
        <hr>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Data</a><br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Anggota</th>
                    <th>Buku</th>
                    <th>Petugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $item)
                    <tr>
                        <td>{{ $item->id_peminjaman }}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_harus_kembali }}</td>
                        <td>{{ $item->anggota->nama_anggota }}</td>
                        <td>{{ $item->buku->judul_buku }}</td>
                        <td>{{ $item->petugas->nama_petugas }}</td>
                        <td>{{ $item->status }}</td>
                        <td class="gap-1 d-flex">
                            <a href="{{ route('peminjaman.edit', $item->id_peminjaman) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('peminjaman.destroy', $item->id_peminjaman) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('hapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
