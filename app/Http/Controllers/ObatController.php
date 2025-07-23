<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Tampilan dan Search
     */
    public function index(Request $request)
{
    $keyword = $request->input('keyword');

    $obats = Obat::query();

    if ($keyword) {
        $obats->where('nama', 'like', "%{$keyword}%")
              ->orWhere('kategori', 'like', "%{$keyword}%");
    }

    $obats = $obats->latest()->get();

    return view('obat.index', compact('obats', 'keyword'));
}

    /**
     * Input data
     */
    public function create()
    {
    $suppliers = Supplier::all();
    return view('obat.create', compact('suppliers'));
    }
    /**
     * Menyimpan ke DB
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'kategori' => 'required',
        'stok' => 'required|integer',
        'harga' => 'required|integer',
        'supplier_id' => 'required|exists:suppliers,id',
    ]);

    Obat::create([
        'nama' => $request->nama,
        'kategori' => $request->kategori,
        'stok' => $request->stok,
        'harga' => $request->harga,
        'supplier_id' => $request->supplier_id,
    ]);

    return redirect()->route('obat.index')->with('success', 'Data berhasil disimpan');
}

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Edit data
     */
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'nama' => 'required',
        'kategori' => 'required',
        'stok' => 'required|integer',
        'harga' => 'required|numeric',
        'supplier_id' => 'required|exists:suppliers,id',
    ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->only(['nama', 'kategori', 'stok', 'harga', 'supplier_id']));

        return redirect()->route('obat.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Data berhasil dihapus.');
    }
}
