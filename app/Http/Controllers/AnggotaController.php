<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $anggota = AnggotaModel::all();
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $anggota = AnggotaModel::all();
        return view('anggota.create', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nisn' => 'required',
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
        ]);

        $anggota = [
            'nisn' => $request->nisn,
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
        ];

        AnggotaModel::create($anggota);
        return redirect()->route('anggota.index')->with('success', 'berhasil di simpan');
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
        $anggota = AnggotaModel::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nisn' => 'required',
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
        ]);

        $anggota = AnggotaModel::findOrFail($id);

        $anggota->update([
            'nisn' => $request->nisn,
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('anggota.index')->with('success', 'berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        AnggotaModel::where('id_anggota', $id)->delete();
        return redirect()->route('anggota.index')->with('success', 'berhasil di hapus');
    }
}