<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Detail Kemasan</h2>
    </x-slot>

    <div class="p-6 text-white">
        <div class="bg-gray-800 p-6 rounded-lg shadow-md space-y-4">
            {{-- Informasi Kemasan --}}
            <div class="space-y-2">
                <p><span class="font-semibold">Nama Kemasan:</span> {{ $kemasan->nama_kemasan }}</p>
                <p><span class="font-semibold">Tanggal Produksi:</span> {{ $kemasan->tanggal_produksi }}</p>
                <p><span class="font-semibold">Tanggal Kadaluarsa:</span> {{ $kemasan->tanggal_kadaluarsa }}</p>
                <p><span class="font-semibold">Petunjuk Penyimpanan:</span> {{ $kemasan->petunjuk_penyimpanan }}</p>
            </div>

            {{-- Tabel Obat yang Menggunakan Kemasan Ini --}}
            <div class="mt-6">
                <h3 class="text-lg font-bold border-b border-gray-600 pb-2 mb-3">Obat dengan Kemasan Ini</h3>
                <table class="w-full border border-gray-600">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="px-4 py-2 border">Nama Obat</th>
                            <th class="px-4 py-2 border">Kategori</th>
                            <th class="px-4 py-2 border">Stok</th>
                            <th class="px-4 py-2 border">Harga</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($kemasan->obats as $obat)
                            <tr class="bg-gray-800 hover:bg-gray-700">
                                <td class="px-4 py-2 border">{{ $obat->nama }}</td>
                                <td class="px-4 py-2 border">{{ $obat->kategori }}</td>
                                <td class="px-4 py-2 border">{{ $obat->stok }}</td>
                                <td class="px-4 py-2 border text-green-400">Rp{{ number_format($obat->harga) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-2 border text-gray-400 italic">Belum ada obat yang menggunakan kemasan ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>