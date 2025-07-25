<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray-800 font-semibold text-xl">Metode Pembayaran</h2>
    </x-slot>

    <div class="p-6">

        {{-- Tombol Tambah (admin & petugas) --}}
        @hasanyrole('admin|petugas')
        <div class="mb-4">
            <a href="{{ route('metode_pembayaran.create') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                + Tambah Metode
            </a>
        </div>
        @endhasanyrole

        {{-- Tabel Metode Pembayaran --}}
        <table class="mt-4 w-full border border-gray-600 text-white">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="px-4 py-2 border">Nama Metode</th>
                    <th class="px-4 py-2 border">keterangan</th>
                    @role('admin')
                        <th class="px-4 py-2 border">Aksi</th>
                    @endrole
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($metode_pembayaran as $metode)
                    <tr class="bg-gray-800 hover:bg-gray-700">
                        <td class="px-4 py-2 border">{{ $metode->nama_metode }}</td>
                        <td class="px-4 py-2 border">{{ $metode->keterangan ?? '-' }}</td>

                        @role('admin')
                        <td class="px-4 py-2 border space-x-2">
                            <a href="{{ route('metode_pembayaran.edit', $metode->id) }}"
                               class="text-blue-400 hover:underline">Edit</a>

                            <form action="{{ route('metode_pembayaran.destroy', $metode->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin ingin hapus?')"
                                        class="text-red-500 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                        @endrole
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 border text-gray-400">Belum ada metode pembayaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
