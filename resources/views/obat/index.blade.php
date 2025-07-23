<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray font-semibold text-xl">Data Obat</h2>
    </x-slot>

    <div class="p-6">

        {{-- Form Cari --}}
        <form method="GET" action="{{ route('obat.index') }}" class="mb-4">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Cari nama atau jenis..."
                class="border rounded p-2 w-1/3">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cari</button>
        </form>

        {{-- Tombol Tambah --}}
        @role('admin|petugas')
        <div class="mb-4">
            <a href="{{ route('obat.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Obat</a>
        </div>
        @endrole

        {{-- Tabel Data --}}
        <table class="mt-4 w-full border border-gray-600 text-white">
    <thead>
        <tr class="bg-blue-500 text-white">
            <th class="px-4 py-2 border">Nama</th>
            <th class="px-4 py-2 border">kategori</th>
            <th class="px-4 py-2 border">Stok</th>
            <th class="px-4 py-2 border">Harga</th>
            @role('admin')
            <th class="px-4 py-2 border"></th>
            @endrole
        </tr>
    </thead>
    <tbody class="text-center">
        @forelse($obats as $obat)
        <tr class="bg-gray-800 hover:bg-gray-700">
            <td class="px-4 py-2 border">{{ $obat->nama }}</td>
            <td class="px-4 py-2 border">{{ $obat->kategori }}</td>
            <td class="px-4 py-2 border">{{ $obat->stok }}</td>
            <td class="px-4 py-2 border">{{ $obat->harga }}</td>

            @role('admin')
            <td class="px-4 py-2 border space-x-2">
                <a href="{{ route('obat.edit', $obat->id) }}" class="text-blue-400 hover:underline">Edit</a>

                <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="text-red-500 hover:underline">Hapus</button>
                
                </form>
            </td>
            @endrole
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center text-red-400 py-4">Data tidak ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>

    </div>
</x-app-layout>
