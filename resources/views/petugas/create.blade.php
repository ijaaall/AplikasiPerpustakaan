@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Data Petugas</h1>
        <hr>
        <form action="{{ route('petugas.store') }}" method="post">
            @csrf
            <label for="nama_petugas" class="form form-label">Nama Petugas</label>
            <input type="text" name="nama_petugas" id="nama_petugas" class="form form-control"
                value="{{ old('nama_petugas') }}" maxlength="100" required><br>
            <label for="usernmae" class="form form-label">Username</label>
            <input type="text" name="username" id="username" class="form form-control" value="{{ old('username') }}"
                required><br>
            <label for="jabatan" class="form form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form form-control" value="{{ old('jabatan') }}"
                required><br>
            <button type="submit" class="btn btn-primary">Simpan</button><br><br>
            <a href="{{ route('petugas.index') }}" class="btn btn-success">Kembali</a>
        </form>
    </div>
@endsection
