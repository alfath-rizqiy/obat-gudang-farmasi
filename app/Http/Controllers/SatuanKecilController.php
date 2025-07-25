<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanKecil;

class SatuanKecilController extends Controller
{
    
    /**
     * Menampilkan semua data satuan kecil.
     */
    public function index()
    {
        $satuankecils = SatuanKecil::all();
        return view('satuankecils.index', compact('satuankecils'));
    }

    /**
     * Menampilkan form untuk membuat data baru.
     */
    public function create()
    {
        return view('satuankecils.create');
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        SatuanKecil::create($validated);

        return redirect()->route('satuankecils.index')
                         ->with('success', 'Satuan Kecil berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satuan kecil tertentu.
     */
    public function show(string $id)
    {
        $satuankecil = SatuanKecil::findOrFail($id);
        return view('satuankecils.show', compact('satuankecil'));
    }

    /**
     * Menampilkan form edit untuk satuan kecil tertentu.
     */
    public function edit(string $id)
    {
        $satuankecil = SatuanKecil::findOrFail($id);
        return view('satuankecils.edit', compact('satuankecil'));
    }

    /**
     * Menyimpan perubahan data satuan kecil.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $satuankecil = SatuanKecil::findOrFail($id);
        $satuankecil->update($validated);

        return redirect()->route('satuankecils.index')
                         ->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Menghapus data satuan kecil.
     */
    public function destroy(string $id)
    {
        $satuankecil = SatuanKecil::findOrFail($id);
        $satuankecil->delete();

        return redirect()->route('satuankecils.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}
