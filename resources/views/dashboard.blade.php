@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-1">Selamat datang, {{ auth()->user()->name }}!</h4>
            <p class="text-muted mb-0">
                Kelola data buku, anggota, serta transaksi peminjaman dan pengembalian
                dari menu di bagian atas.
            </p>
        </div>
    </div>
@endsection
