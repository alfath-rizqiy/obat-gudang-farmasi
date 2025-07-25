<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;

class MetodePembayaranController extends Controller
{
    // Menampilkan semua data metode pembayaran
    public function index()
    {
        $metode_pembayaran = MetodePembayaran::all();
        return view('metode_pembayaran.index', compact('metode_pembayaran'));
    }

    // Menampilkan form tambah metode
    public function create()
    {
        if (!auth()->user()->hasAnyRole(['admin', 'petugas'])) {
            abort(403, 'Role tidak diizinkan menambah data');
        }

        return view('metode_pembayaran.create');
    }

    // Menyimpan data metode pembayaran baru
    public function store(Request $request)
    {
        if (!auth()->user()->hasAnyRole(['admin', 'petugas'])) {
            abort(403, 'Role tidak diizinkan menyimpan data');
        }

        $request->validate([
            'nama_metode' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        MetodePembayaran::create($request->all());

        return redirect()->route('metode_pembayaran.index')
                         ->with('success', 'Metode pembayaran berhasil ditambahkan.');
    }

    // Menampilkan form edit metode
    public function edit($id)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Petugas tidak boleh mengedit data');
        }

        $metode_pembayaran = MetodePembayaran::findOrFail($id);
        return view('metode_pembayaran.edit', compact('metode_pembayaran'));
    }

    // Mengupdate data metode pembayaran
    public function update(Request $request, $id)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Petugas tidak boleh mengupdate data');
        }

        $request->validate([
            'nama_metode' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $metode_pembayaran = MetodePembayaran::findOrFail($id);
        $metode_pembayaran->update($request->all());

        return redirect()->route('metode_pembayaran.index')
                         ->with('success', 'Metode pembayaran berhasil diupdate.');
    }

    // Menghapus data metode pembayaran
    public function destroy($id)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Petugas tidak boleh menghapus data');
        }

        $metode_pembayaran = MetodePembayaran::findOrFail($id);
        $metode_pembayaran->delete();

        return redirect()->route('metode_pembayaran.index')
                         ->with('success', 'Metode pembayaran berhasil dihapus.');
    }
}
