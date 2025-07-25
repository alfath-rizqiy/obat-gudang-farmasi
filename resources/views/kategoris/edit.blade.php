<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Edit Kategori</h2>
    </x-slot>

    <div class="p-6 text-white">
        <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST"
            class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_kategori" class="block mb-1 font-semibold">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block mb-1 font-semibold">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi"
                    value="{{ old('deskripsi', $kategori->deskripsi) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
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
