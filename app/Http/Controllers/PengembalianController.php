<?php

namespace App\Http\Controllers;

use App\Models\PengembalianModel;
use App\Models\PeminjamanModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = PengembalianModel::with('peminjaman.anggota', 'peminjaman.buku')->get();
        return view('pengembalian.index', compact('pengembalian'));
    }

    public function create()
    {
        // Hanya ambil peminjaman yang statusnya masih dipinjam (opsional, sesuaikan kebutuhan)
        $peminjaman = PeminjamanModel::all();
        return view('pengembalian.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required',
            'tanggal_kembali' => 'required|date',
        ]);

        $peminjaman = PeminjamanModel::findOrFail($request->id_peminjaman);

        $tanggalHarusKembali = Carbon::parse($peminjaman->tanggal_harus_kembali);
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);

        $terlambatHari = 0;
        $denda = 0;

        if ($tanggalKembali->greaterThan($tanggalHarusKembali)) {
            $terlambatHari = $tanggalHarusKembali->diffInDays($tanggalKembali);
            $denda = $terlambatHari * 1000;
        }

        PengembalianModel::create([
            'id_peminjaman' => $request->id_peminjaman,
            'tanggal_kembali' => $request->tanggal_kembali,
            'terlambat_hari' => $terlambatHari,
            'denda' => $denda,
        ]);
        $peminjaman->update(['status' => 'Dikembalikan']);

        if ($peminjaman->buku) {
            $peminjaman->buku->increment('stok');
        }

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil ditambahkan, denda dihitung otomatis, dan stok buku bertambah.');
    }

    public function edit(string $id)
    {
        $pengembalian = PengembalianModel::findOrFail($id);
        $peminjaman = PeminjamanModel::all();
        return view('pengembalian.edit', compact('pengembalian', 'peminjaman'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_peminjaman' => 'required',
            'tanggal_kembali' => 'required|date',
        ]);

        $pengembalian = PengembalianModel::findOrFail($id);
        $peminjaman = PeminjamanModel::findOrFail($request->id_peminjaman);

        // Hitung ulang otomatis saat di-update
        $tanggalHarusKembali = Carbon::parse($peminjaman->tanggal_harus_kembali);
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);

        $terlambatHari = 0;
        $denda = 0;

        if ($tanggalKembali->greaterThan($tanggalHarusKembali)) {
            $terlambatHari = $tanggalHarusKembali->diffInDays($tanggalKembali);
            $denda = $terlambatHari * 1000;
        }

        $pengembalian->update([
            'id_peminjaman' => $request->id_peminjaman,
            'tanggal_kembali' => $request->tanggal_kembali,
            'terlambat_hari' => $terlambatHari,
            'denda' => $denda,
        ]);

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $pengembalian = PengembalianModel::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus.');
    }
}