@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Tambah Data Buku</h1>
        <hr>
        <form action="{{ route('buku.store') }}" method="post">
            @csrf
            <label for="kode_buku" class="form form-label">Kode Buku</label>
            <input type="text" name="kode_buku" id="kode_buku" class="form form-control" value="{{ old('kode_buku') }}"
                maxlength="20" required><br>
            <label for="judul_buku" class="form form-label">Judul Buku</label>
            <input type="text" name="judul_buku" id="judul_buku" class="form form-control"
                value="{{ old('judul_buku') }}" maxlength="150" required><br>
            <label for="penulis" class="form form-label">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form form-control" value="{{ old('penulis') }}"
                maxlength="100" required><br>
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form form-control" value="{{ old('stok') }}"
                required> <br>
            <button type="submit" class="btn btn-primary">Simpan</button><br><br>
            <a href="{{ route('buku.index') }}" class="btn btn-success">Kembali</a>
        </form>
    </div>
@endsection
