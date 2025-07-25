<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategoris.index', compact('kategoris')); 
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        if (!auth()->user()->hasAnyRole(['admin', 'petugas'])) {
            abort(403, 'Role tidak diizinkan menambah data');
        }

        return view('kategoris.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        if (!auth()->user()->hasAnyRole(['admin', 'petugas'])) {
            abort(403, 'Role tidak diizinkan menyimpan data');
        }

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Kategori::create($validated);

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan detail kategori (opsional)
    public function show(string $id)
    {
        $kategori = Kategori::with('obats')->findOrFail($id);
        return view('kategoris.show', compact('kategori'));
    }

    // Menampilkan form edit kategori
    public function edit(string $id)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Petugas tidak boleh mengedit data');
        }

        $kategori = Kategori::findOrFail($id);
        return view('kategoris.edit', compact('kategori'));
    }

    // Mengupdate kategori
    public function update(Request $request, string $id)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Petugas tidak boleh mengupdate data');
        }

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($validated);

        return redirect()->route('kategoris.index')->with('success', 'Data berhasil diupdate.');
    }

    // Menghapus kategori
    public function destroy(string $id)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Petugas tidak boleh menghapus data');
        }

        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategoris.index')->with('success', 'Data berhasil dihapus.');
    }
}
