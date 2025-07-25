<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray font-semibold text-xl">Satuan Kecil</h2>
    </x-slot>

    <div class="p-6">

    {{-- Tambah --}}
    @role('admin')
    <div class="mb-4">
        <a href="{{ route('satuankecils.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Satuan Kecil </a>
    </div>
    @endrole

    <table class="mt-4 w-full border border-gray-600 text-white">
            <thead>
                <tr class="bg-blue-500 text-white">
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Deskripsi</th>
                @role('admin')
                    <th class="px-4 py-2">Aksi</th>
                    @endrole
            </tr>
        </thead>
        <tbody>
            @foreach ($satuankecils as $satuankecil)
            <tr class="bg-gray-800 hover:bg-gray-700">
                <td class="px-4 py-2 border">{{ $satuankecil->nama }}</td>
                <td class="px-4 py-2 border">{{ $satuankecil->deskripsi }}</td>
                <td>
                    <a href="{{ route('satuankecils.show', $satuankecil->id) }}" class="text-blue-400 hover:underline">Detail</a>
                    <a href="{{ route('satuankecils.edit', $satuankecil->id) }}" class="text-blue-400 hover:underline">Edit</a>
                    <form action="{{ route('satuankecils.destroy', $satuankecil->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
