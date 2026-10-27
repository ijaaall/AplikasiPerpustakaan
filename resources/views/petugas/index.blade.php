@extends('layouts.main');

@section('content')
    <div class="container">
        <h2>Data Petugas</h2>
        <hr>
        <a href="{{ route('petugas.create') }}" class="btn btn-primary">Tambah Data</a>
        <br><br>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $data)
                    <tr>
                        <td>{{ $data->id_petugas }}</td>
                        <td>{{ $data->nama_petugas }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('petugas.edit', $data->id_petugas) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('petugas.destroy', $data->id_petugas) }}" method="post">
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
