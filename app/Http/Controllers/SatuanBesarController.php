<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanBesar;

class SatuanBesarController extends Controller
{
    public function index()
    {
        $satuanbesars = SatuanBesar::all();
        return view('satuanbesars.index', compact('satuanbesars'));
    }

    public function create()
    {
        return view('satuanbesars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah_satuankecil' => 'required|string|max:255',
        ]);

        SatuanBesar::create($validated);
        return redirect()->route('satuanbesars.index')
                         ->with('success', 'Satuan Besar berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $satuanbesars = SatuanBesar::findOrFail($id);
        return view('satuanbesars.show', compact('satuanbesars'));
    }

    public function edit(string $id)
    {
        $satuanbesars = SatuanBesar::findOrFail($id);
        return view('satuanbesars.edit', compact('satuanbesars'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah_satuankecil' => 'required|string|max:255',
        ]);

        $satuanbesars = SatuanBesar::findOrFail($id);
        $satuanbesars->update($validated);

        return redirect()->route('satuanbesars.index')
                         ->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $satuanbesars = SatuanBesar::findOrFail($id);
        $satuanbesars->delete();

        return redirect()->route('satuanbesars.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}
