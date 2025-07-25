<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray">
            Detail Sartuan Besar: {{ $satuanbesars->nama }}
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-800 rounded-xl shadow-md text-white ">
        <div class="space-y-1">
            <p><span class="font-semibold">Deskripsi:</span> {{ $satuanbesars->deskripsi }}</p>
            <p><span class="font-semibold">Jumlah Satuan Kecil:</span> {{ $satuanbesars->jumlah_satuankecil }}</p>
        </div>

    <a href="{{ route('satuanbesars.index') }}" class="btn btn-primary">Kembali</a>
</div>
</x-app-layout>
