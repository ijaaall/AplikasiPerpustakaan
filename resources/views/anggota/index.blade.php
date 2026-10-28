@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Data Anggota</h1>
        <hr>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Data</a><br><br>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <th>NO</th>
                <th>NISN</th>
                <th>Nama Anggota</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($anggota as $item)
                    <tr>
                        <td>{{ $item->id_anggota }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nama_anggota }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('anggota.edit', $item->id_anggota) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('anggota.destroy', $item->id_anggota) }}" method="post">
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
