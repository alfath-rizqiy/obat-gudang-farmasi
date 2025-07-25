<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Edit Metode Pembayaran</h2>
    </x-slot>

    <div class="p-6 text-white">
        {{-- Flash message --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-600 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Edit --}}
        <form action="{{ route('metode_pembayaran.update', $metode_pembayaran->id) }}" method="POST"
            class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            {{-- Nama Metode --}}
            <div class="mb-4">
                <label for="nama_metode" class="block mb-1 font-semibold">Nama Metode</label>
                <input type="text" name="nama_metode" id="nama_metode"
                    value="{{ old('nama_metode', $metode_pembayaran->nama_metode) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('nama_metode')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- keterangan --}}
            <div class="mb-4">
                <label for="keterangan" class="block mb-1 font-semibold">keterangan</label>
                <input type="text" name="keterangan" id="keterangan"
                    value="{{ old('keterangan', $metode_pembayaran->keterangan) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('keterangan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
