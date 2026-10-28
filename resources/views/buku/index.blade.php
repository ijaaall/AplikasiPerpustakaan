@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Data Buku</h1>
        <hr>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Data</a><br><br>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <th>NO</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Stok</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($buku as $item)
                    <tr>
                        <td>{{ $item->id_buku }}</td>
                        <td>{{ $item->kode_buku }}</td>
                        <td>{{ $item->judul_buku }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->stok }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('buku.edit', $item->id_buku) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('buku.destroy', $item->id_buku) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('hapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
