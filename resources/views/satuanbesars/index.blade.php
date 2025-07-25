<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray font-semibold text-xl">Satuan Besar</h2>
    </x-slot>

    <div class="p-6">

    {{-- Tambah --}}
    @role('admin')
    <div class="mb-4">
        <a href="{{ route('satuanbesars.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Satuan Besar </a>
    </div>
    @endrole

    <table class="mt-4 w-full border border-gray-600 text-white">
            <thead>
                <tr class="bg-blue-500 text-white">
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Deskripsi</th>
                <th class="px-4 py-2 border">Jumlah Satuan Kecil</th>
                @role('admin')
                    <th class="px-4 py-2">Aksi</th>
                    @endrole
            </tr>
        </thead>
        <tbody>
            @forelse ($satuanbesars as $satuanbesar)
            <tr class="bg-gray-800 hover:bg-gray-700">
                <td class="px-4 py-2 border">{{ $satuanbesar->nama }}</td>
                <td class="px-4 py-2 border">{{ $satuanbesar->deskripsi}}</td>
                <td class="px-4 py-2 border">{{ $satuanbesar->jumlah_satuankecil }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('satuanbesars.show', $satuanbesar->id) }}" class="text-blue-400 hover:underline">Detail</a>
                    <a href="{{ route('satuanbesars.edit', $satuanbesar->id) }}" class="text-blue-400 hover:underline">Edit</a>
                    <form action="{{ route('satuanbesars.destroy', $satuanbesar->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data satuan besar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
