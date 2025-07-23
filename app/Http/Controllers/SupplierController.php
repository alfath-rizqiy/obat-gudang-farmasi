<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama_supplier' => 'required|string',
        'telepon' => 'required|string',
        'alamat' => 'required|string',
        'produksi' => 'required|integer',
    ]);

    Supplier::create($validated);

    return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $supplier = Supplier::with('obats')->findOrFail($id);
         return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $supplier = Supplier::findOrFail($id); // perbaikan di sini
    return view('suppliers.edit', compact('supplier')); // dan di sini
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nama_supplier' => 'required',
        'telepon' => 'required|string',
        'alamat' => 'required',
        'produksi' => 'required|integer',
    ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->only(['nama_supplier', 'telepon', 'alamat', 'produksi']));;

        return redirect()->route('suppliers.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Data berhasil dihapus.');
    }
}
