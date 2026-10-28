@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Update Data Petugas</h1>
        <hr>
        <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="post">
            @csrf
            @method('PUT')
            <label for="nama_petugas" class="form form-label">Nama Petugas</label>
            <input type="text" name="nama_petugas" id="nama_petugas" class="form form-control" maxlength="100"
                value="{{ old('nama_petugas', $petugas->nama_petugas) }}" required><br>
            <label for="usernmae" class="form form-label">Username</label>
            <input type="text" name="username" id="username" class="form form-control"
                value="{{ old('nama_petugas', $petugas->username) }}" required><br>
            <label for="jabatan" class="form form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form form-control"
                value="{{ old('nama_petugas', $petugas->jabatan) }}" required><br>
            <button type="submit" class="btn btn-primary">Update</button><br><br>
            <a href="{{ route('petugas.index') }}" class="btn btn-success">Kembali</a>
        </form>
    </div>
@endsection
