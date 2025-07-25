<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray">
            Detail Satuan Kecil: {{ $satuankecil->nama }}
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-800 rounded-xl shadow-md text-white ">
        <div class="space-y-1">
            <p><span class="font-semibold">Deskripsi:</span> {{ $satuankecil->deskripsi }}</p>
        </div>
    <a href="{{ route('satuankecils.index') }}" class="btn btn-primary">Kembali</a>
</div>
</x-app-layout>
