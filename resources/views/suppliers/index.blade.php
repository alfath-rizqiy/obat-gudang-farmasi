<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray font-semibold text-xl">Supplier</h2>
    </x-slot>

    <div class="p-6">

    {{-- Tambah --}}
    @role('admin')
    <div class="mb-4">
        <a href="{{ route('suppliers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Supplier </a>
    </div>
    @endrole

    {{-- Tabel --}}
        <table class="mt-4 w-full border border-gray-600 text-white">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Telepon</th>
                    <th class="px-4 py-2 border">Alamat</th>
                    <th class="px-4 py-2 border">Produksi</th>
                    @role('admin')
                    <th class="px-4 py-2">Aksi</th>
                    @endrole
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($suppliers as $supplier)
                    <tr class="bg-gray-800 hover:bg-gray-700">
                        <td class="px-4 py-2 border">{{ $supplier->nama_supplier }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->telepon }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->alamat }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->produksi }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->aksi}}
                            <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-green-400 hover:underline">Detail</a>
            @role('admin')
            
                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="text-blue-400 hover:underline">Edit</a>

                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="text-red-500 hover:underline">Hapus</button>
                </form>
            </td>
            @endrole
                   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
