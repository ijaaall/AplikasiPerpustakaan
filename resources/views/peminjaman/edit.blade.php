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
        <form action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" method="post">
            @csrf
            @method('PUT')
            <label for="">tanggal Peminjaman</label>
            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman"
                value="{{ old('tanggal_peminjaman', $peminjaman->tanggal_peminjaman) }}"><br>
            <label for="">tanggal harus kembali</label>
            <input type="date" name="tanggal_harus_kembali" id="tanggal_harus_kembali"
                value="{{ old('tanggal_harus_kembali', $peminjaman->tanggal_harus_kembali) }}"><br>
            <label for="">anggota</label>
            <select name="id_anggota" id="id_anggota">
                <option value="">PILIH DATA</option>
                @foreach ($anggota as $item)
                    <option value="{{ $item->id_anggota }}"
                        {{ old('id_anggota', $item->id_anggota) == $item->id_anggota ? 'selected' : '' }}>
                        {{ $item->nama_anggota }}</option>
                @endforeach
            </select><br>
            <label for="">buku</label>
            <select name="id_buku" id="id_buku">
                <option value="">PILIH DATA</option>
                @foreach ($buku as $item)
                    <option value="{{ $item->id_buku }}"
                        {{ old('id_buku', $item->id_buku) == $item->id_buku ? 'selected' : '' }}>
                        {{ $item->judul_buku }}</option>
                @endforeach
            </select><br>
            <label for="">petugas</label>
            <select name="id_petugas" id="id_petugas">
                <option value="">PILIH DATA</option>
                @foreach ($petugas as $item)
                    <option value="{{ $item->id_petugas }}"
                        {{ old('id_petugas', $item->id_petugas) == $item->id_petugas ? 'selected' : '' }}>
                        {{ $item->nama_petugas }}</option>
                @endforeach
            </select><br>

            @php
                $status = old('status', $peminjaman->status);
            @endphp

            <label for="">status</label>
            <div class="form-check">
                <input type="radio" name="status" id="P" value="DiPinjam" {{ $status === 'P' ? 'checked' : '' }}
                    {{ old('status') == 'P' ? 'checked' : '' }} {{ old('status') == 'P' ? 'checked' : '' }}>
                <label for="">Dipinjam</label>
            </div>
            <div class="form-check">
                <input type="radio" name="status" id="K" value="diKembalikan"
                    {{ $status === 'K' ? 'checked' : '' }} {{ old('status') == 'K' ? 'checked' : '' }} required>
                <label for="">DiKembalikan</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">update</button><br>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-success">Kembali</a>
        </form>
    </div>
@endsection
