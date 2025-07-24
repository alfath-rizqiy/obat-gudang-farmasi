<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Data Aturan Pakai</h2>
    </x-slot>

    <div class="p-6 text-white">

        {{-- Tombol Tambah (Hanya Admin) --}}
        @role('admin')
        <div class="mb-4">
            <a href="{{ route('aturanpakais.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Aturan Pakai</a>
        </div>
        @endrole

        {{-- Tabel Aturan Pakai --}}
        <table class="mt-4 w-full border border-gray-600">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="px-4 py-2 border">Frekuensi Pemakaian</th>
                    <th class="px-4 py-2 border">Waktu Pemakaian</th>
                    <th class="px-4 py-2 border">Deskripsi</th>
                    @role('admin')
                    <th class="px-4 py-2 border">Aksi</th>
                    @endrole
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($aturanPakais as $aturan)
                    <tr class="bg-gray-800 hover:bg-gray-700">
                        <td class="px-4 py-2 border">{{ $aturan->frekuensi_pemakaian }}</td>
                        <td class="px-4 py-2 border">{{ $aturan->waktu_pemakaian }}</td>
                        <td class="px-4 py-2 border">{{ $aturan->deskripsi }}</td>
                        @role('admin')
                        <td class="px-4 py-2 border">
                            <a href="{{ route('aturanpakais.show', $aturan->id) }}" class="text-green-400 hover:underline">Detail</a>
                            <a href="{{ route('aturanpakais.edit', $aturan->id) }}" class="text-blue-400 hover:underline mx-2">Edit</a>
                            <form action="{{ route('aturanpakais.destroy', $aturan->id) }}" method="POST" class="inline">
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
