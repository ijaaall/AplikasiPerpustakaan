<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PeminjamanModel;
use App\Models\PetugasModel;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $peminjaman = PeminjamanModel::all();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $anggota = AnggotaModel::all();
        $buku = BukuModel::all();
        $petugas = PetugasModel::all();
        return view('peminjaman.create', compact('anggota', 'buku', 'petugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tanggal_peminjaman' => 'required',
            'tanggal_harus_kembali' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'id_petugas' => 'required',
            'status' => 'required',
        ]);

        $peminjaman = [
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_harus_kembali' => $request->tanggal_harus_kembali,
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'id_petugas' => $request->id_petugas,
            'status' => $request->status,
        ];

        PeminjamanModel::create($peminjaman);
        return redirect()->route('peminjaman.index')->with('success', 'data berhasil di tambahkan');
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
        $peminjaman = PeminjamanModel::findOrFail($id);
        $anggota = AnggotaModel::all();
        $buku = BukuModel::all();
        $petugas = PetugasModel::all();
        return view('peminjaman.edit', compact('peminjaman', 'anggota', 'buku', 'petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal_peminjaman' => 'required',
            'tanggal_harus_kembali' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'id_petugas' => 'required',
            'status' => 'required',
        ]);

        $peminjaman = PeminjamanModel::findOrFail($id);

        $peminjaman->update([
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_harus_kembali' => $request->tanggal_harus_kembali,
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'id_petugas' => $request->id_petugas,
            'status' => $request->status,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PeminjamanModel::where('id_peminjaman', $id)->delete();
        return redirect()->route('peminjaman.index')->with('success', 'data berhasil di hapus');
    }
}
