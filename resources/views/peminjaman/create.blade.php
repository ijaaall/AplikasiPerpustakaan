@extends('layouts.app')

@section('title', 'Tambah Data Peminjaman')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>tambah data peminjaman</h2>
        <hr>
        <form action="{{ route('peminjaman.store') }}" method="post">
            @csrf
            <label for="">tanggal Peminjaman</label>
            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}"><br>
            <label for="">tanggal harus kembali</label>
            <input type="date" name="tanggal_harus_kembali" id="tanggal_harus_kembali"
                value="{{ old('tanggal_harus_kembali') }}"><br>
            <label for="">anggota</label>
            <select name="id_anggota" id="id_anggota">
                <option value="">PILIH DATA</option>
                @foreach ($anggota as $item)
                    <option value="{{ $item->id_anggota }}">{{ $item->nama_anggota }}</option>
                @endforeach
            </select><br>
            <label for="">buku</label>
            <select name="id_buku" id="id_buku">
                <option value="">PILIH DATA</option>
                @foreach ($buku as $item)
                    <option value="{{ $item->id_buku }}">{{ $item->judul_buku }}</option>
                @endforeach
            </select><br>
            <label for="">petugas</label>
            <select name="id_petugas" id="id_petugas">
                <option value="">PILIH DATA</option>
                @foreach ($petugas as $item)
                    <option value="{{ $item->id_petugas }}">{{ $item->nama_petugas }}</option>
                @endforeach
            </select><br>
            <label for="">status</label>
            <div class="form-check">
                <input type="radio" name="status" id="P" value="DiPinjam"
                    {{ old('status') == 'P' ? 'checked' : '' }}>
                <label for="">Dipinjam</label>
            </div>
            <div class="form-check">
                <input type="radio" name="status" id="K" value="diKembalikan"
                    {{ old('status') == 'K' ? 'checked' : '' }}>
                <label for="">DiKembalikan</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button><br>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-success">Kembali</a>
        </form>
    </div>
@endsection
