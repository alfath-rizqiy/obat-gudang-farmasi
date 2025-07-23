<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray">
            Detail Supplier: {{ $supplier->nama_supplier }}
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-800 rounded-xl shadow-md text-white ">
        <div class="space-y-1">
            <p><span class="font-semibold">Telepon:</span> {{ $supplier->telepon }}</p>
            <p><span class="font-semibold">Alamat:</span> {{ $supplier->alamat }}</p>
            <p><span class="font-semibold">Produksi:</span> {{ $supplier->produksi }}</p>
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-bold border-b border-gray-600 pb-2 mb-3">Obat yang Disuplai:</h3>
            <ul class="space-y-2">
                @forelse ($supplier->obats as $obat)
                    <li class="bg-gray-700 p-4 rounded-md shadow-sm hover:bg-gray-600 transition">
                        <span class="font-medium">{{ $obat->nama }}</span> - {{ $obat->kategori }}  
                        <span class="block text-sm text-gray-300">
                            Stok: {{ $obat->stok }}, Harga: <span class="font-semibold text-green-400">Rp{{ number_format($obat->harga) }}</span>
                        </span>
                    </li>
                @empty
                    <li class="text-gray-400 italic">Tidak ada obat yang disuplai.</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>
