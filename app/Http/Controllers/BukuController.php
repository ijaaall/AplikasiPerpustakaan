<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $buku = BukuModel::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $buku = BukuModel::all();
        return view('buku.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'penulis' => 'required',
            'stok' => 'required',
        ]);

        $buku = [
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'stok' => $request->stok,
        ];

        BukuModel::create($buku);
        return redirect()->route('buku.index')->with('success', 'berhasil menambahkan data');
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
        $buku = BukuModel::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'penulis' => 'required',
            'stok' => 'required',
        ]);

        $buku = BukuModel::findOrFail($id);

        $buku->update([
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'stok' => $request->stok,
        ]);

        return redirect()->route('buku.index')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        BukuModel::where('id_buku', $id)->delete();
        return redirect()->route('buku.index')->with('success', 'berhasil menghapus data');
    }
}