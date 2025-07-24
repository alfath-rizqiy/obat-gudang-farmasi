<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AturanPakai;

class AturanPakaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aturanPakais = AturanPakai::all();
        return view('aturanpakais.index', compact('aturanPakais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aturanpakais.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'frekuensi_pemakaian' => 'required|string|max:255',
            'waktu_pemakaian'     => 'required|string|max:255',
            'deskripsi'           => 'required|string',
        ]);

        AturanPakai::create($validated);

        return redirect()->route('aturanpakais.index')->with('success', 'Aturan pakai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aturanPakai = AturanPakai::findOrFail($id);
        return view('aturanpakais.show', compact('aturanPakai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aturanPakai = AturanPakai::findOrFail($id);
        return view('aturanpakais.edit', compact('aturanPakai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'frekuensi_pemakaian' => 'required|string|max:255',
            'waktu_pemakaian'     => 'required|string|max:255',
            'deskripsi'           => 'required|string',
        ]);

        $aturanPakai = AturanPakai::findOrFail($id);
        $aturanPakai->update($validated);

        return redirect()->route('aturanpakais.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aturanPakai = AturanPakai::findOrFail($id);
        $aturanPakai->delete();

        return redirect()->route('aturanpakais.index')->with('success', 'Data berhasil dihapus.');
    }
}
