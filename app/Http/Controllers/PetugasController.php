<?php

namespace App\Http\Controllers;

use App\Models\PetugasModel;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $petugas = PetugasModel::all();
        return view('petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'jabatan' => 'required',
        ]);

        $petugas = [
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'jabatan' => $request->jabatan,
        ];

        PetugasModel::create($petugas);
        return redirect()->route('petugas.index')->with('success', 'data berhasil di simpan');
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
        $petugas = PetugasModel::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'jabatan' => 'required',
        ]);

        $petugas = PetugasModel::findOrFail($id);

        $petugas->update([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('petugas.index')->with('success', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
