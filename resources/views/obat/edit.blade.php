<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Edit Obat</h2>
    </x-slot>

    <div class="p-6 text-white">
        <form action="{{ route('obat.update', $obat->id) }}" method="POST"
            class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block mb-1 font-semibold">Nama Obat</label>
                <input type="text" name="nama" id="nama"
                    value="{{ old('nama', $obat->nama) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block mb-1 font-semibold">Kategori Obat</label>
                <input type="text" name="kategori" id="kategori"
                    value="{{ old('kategori', $obat->kategori) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="stok" class="block mb-1 font-semibold">Stok Obat</label>
                <input type="number" name="stok" id="stok"
                    value="{{ old('stok', $obat->stok) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="harga" class="block mb-1 font-semibold">Harga Obat</label>
                <input type="number" name="harga" id="harga"
                    value="{{ old('harga', $obat->harga) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
