<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kemasan;

class KemasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kemasans = Kemasan::all();
        return view('kemasans.index', compact('kemasans')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kemasans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama_kemasan'          => 'required|string|max:255',
        'tanggal_produksi'      => 'required|date',         // karena ini tanggal, lebih baik pakai tipe date
        'tanggal_kadaluarsa'    => 'required|date',         // sama seperti di atas
        'petunjuk_penyimpanan'  => 'required|string|max:255' // petunjuk disimpan sebagai teks

    ]);

    Kemasan::create($validated);

    return redirect()->route('kemasans.index')->with('success', 'kemasan berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $kemasan = Kemasan::with('obats')->findOrFail($id);
         return view('kemasans.show', compact('kemasan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $kemasan = Kemasan::findOrFail($id); // perbaikan di sini
    return view('kemasans.edit', compact('kemasan')); // dan di sini
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nama_kemasan'          => 'required|string|max:255',
        'tanggal_produksi'      => 'required|date',         // karena ini tanggal, lebih baik pakai tipe date
        'tanggal_kadaluarsa'    => 'required|date',         // sama seperti di atas
        'petunjuk_penyimpanan'  => 'required|string|max:255' // petunjuk disimpan sebagai teks

    ]);

        $kemasan = Kemasan::findOrFail($id);
        $kemasan->update($request->only(['nama_kemasan', 'tanggal_produksi', 'tanggal_kadaluarsa', 'petunjuk_penyimpanan']));

        return redirect()->route('kemasans.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kemasan = Kemasan::findOrFail($id);
        $kemasan->delete();

        return redirect()->route('kemasans.index')->with('success', 'Data berhasil dihapus.');
    }
}