<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Data Kemasan</h2>
    </x-slot>

    <div class="p-6 text-white">

        {{-- Tombol Tambah (Hanya Admin) --}}
        @role('admin')
        <div class="mb-4">
            <a href="{{ route('kemasans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Kemasan</a>
        </div>
        @endrole

        {{-- Tabel Kemasan --}}
        <table class="mt-4 w-full border border-gray-600">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="px-4 py-2 border">Nama Kemasan</th>
                    <th class="px-4 py-2 border">Tanggal Produksi</th>
                    <th class="px-4 py-2 border">Tanggal Kadaluarsa</th>
                    <th class="px-4 py-2 border">Petunjuk Penyimpanan</th>
                    @role('admin')
                    <th class="px-4 py-2 border">Aksi</th>
                    @endrole
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($kemasans as $kemasan)
                    <tr class="bg-gray-800 hover:bg-gray-700">
                        <td class="px-4 py-2 border">{{ $kemasan->nama_kemasan }}</td>
                        <td class="px-4 py-2 border">{{ $kemasan->tanggal_produksi }}</td>
                        <td class="px-4 py-2 border">{{ $kemasan->tanggal_kadaluarsa }}</td>
                        <td class="px-4 py-2 border">{{ $kemasan->petunjuk_penyimpanan }}</td>
                        @role('admin')
                        <td class="px-4 py-2 border">
                            <a href="{{ route('kemasans.show', $kemasan->id) }}" class="text-green-400 hover:underline">Detail</a>
                            <a href="{{ route('kemasans.edit', $kemasan->id) }}" class="text-blue-400 hover:underline mx-2">Edit</a>
                            <form action="{{ route('kemasans.destroy', $kemasan->id) }}" method="POST" class="inline">
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