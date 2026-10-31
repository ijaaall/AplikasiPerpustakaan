<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanModel;
use App\Models\PengembalianModel;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pengembalian = PengembalianModel::all();
        $peminjaman = PeminjamanModel::all();
        return view('pengembalian.index', compact('pengembalian', 'peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengembalian = PengembalianModel::all();
        $peminjaman = PeminjamanModel::all();
        return view('pengembalian.create', compact('pengembalian', 'peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id_peminjaman',
            'tanggal_kembali' => 'required|date',
        ]);

        $peminjaman = PeminjamanModel::findOrFail($request->id_peminjaman);

        $batasKembali = Carbon::parse($peminjaman->tanggal_harus_kembali);
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);

        $terlambatHari = 0;
        if ($tanggalKembali->gt($batasKembali)) {
            $terlambatHari = $tanggalKembali->diffInDays($batasKembali);
        }

        $denda = $terlambatHari * 1000;
        $pengembalian = new PengembalianModel();
        $pengembalian->id_peminjaman = $request->id_peminjaman;
        $pengembalian->tanggal_kembali = $request->tanggal_kembali;
        $pengembalian->terlambat_hari = $terlambatHari;
        $pengembalian->denda = $denda;
        $pengembalian->save();

        return response()->json([
            'success' => true,
            'message' => 'Data pengembalian berhasil disimpan.',
            'data' => $pengembalian
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id_peminjaman',
            'tanggal_kembali' => 'required|date',
        ]);

        // 2. Cari data pengembalian yang ingin diubah
        $pengembalian = PengembalianModel::findOrFail($id);

        // 3. Ambil data peminjaman terkait untuk mengetahui batas waktu kembali
        $peminjaman = PeminjamanModel::findOrFail($request->id_peminjaman);

        $batasKembali = Carbon::parse($peminjaman->tanggal_harus_kembali); // Sesuaikan dengan nama kolom di tabel peminjaman Anda
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);

        $terlambatHari = 0;
        if ($tanggalKembali->gt($batasKembali)) {
            $terlambatHari = $tanggalKembali->diffInDays($batasKembali);
        }

        $denda = $terlambatHari * 1000;

        $pengembalian->id_peminjaman = $request->id_peminjaman;
        $pengembalian->tanggal_kembali = $request->tanggal_kembali;
        $pengembalian->terlambat_hari = $terlambatHari;
        $pengembalian->denda = $denda;
        $pengembalian->save();

        // 7. Kembalikan respons sukses
        return response()->json([
            'success' => true,
            'message' => 'Data pengembalian berhasil diperbarui.',
            'data' => $pengembalian
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}