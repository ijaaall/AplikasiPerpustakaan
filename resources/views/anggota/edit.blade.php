@extends('layouts.main')

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
        <h1>Edit Data Anggota</h1>
        <hr>
        <form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="post">
            @csrf
            @method('PUT')
            <label for="nisn" class="form form-label">NISN</label>
            <input type="text" name="nisn" id="nisn" class="form form-control" pattern="[0-9]{10}"
                inputmode="numeric" value="{{ old('nisn', $anggota->nisn) }}" maxlength="10" required
                placeholder="masukkan 10 digit angka"><br>
            <label for="nama_anggota" class="form form-label">Nama Anggota</label>
            <input type="text" name="nama_anggota" id="nama_anggota" class="form form-control"
                value="{{ old('nama_anggota', $anggota->nama_anggota) }}" maxlength="255" required><br>
            <label for="jenis_kelamin">Jenis Kelamin</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_l" value="L"
                    {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} required>
                <label for="jk_l" class="form-check-label">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_p" value="P"
                    {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                <label for="jk_p" class="form-check-label">Perempuan</label>
            </div><br><br>
            <label for="kelas" class="form form-label">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form form-control"
                value="{{ old('kelas', $anggota->kelas) }}" maxlength="20" required placeholder="Contoh : XII PPLG 1"><br>
            <button type="submit" class="btn btn-primary">Update</button><br><br>
            <a href="{{ route('anggota.index') }}" class="btn btn-success">Kembali</a>
        </form>
    </div>
@endsection
