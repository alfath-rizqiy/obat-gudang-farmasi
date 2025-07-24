<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Edit Aturan Pakai</h2>
    </x-slot>

    <div class="p-6 text-white">
        <form action="{{ route('aturanpakais.update', $aturanPakai->id) }}" method="POST"
            class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Frekuensi Pemakaian -->
            <div class="mb-4">
                <label for="frekuensi_pemakaian" class="block mb-1 font-semibold">Frekuensi Pemakaian</label>
                <input type="text" name="frekuensi_pemakaian" id="frekuensi_pemakaian"
                    value="{{ old('frekuensi_pemakaian', $aturanPakai->frekuensi_pemakaian) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Waktu Pemakaian -->
            <div class="mb-4">
                <label for="waktu_pemakaian" class="block mb-1 font-semibold">Waktu Pemakaian</label>
                <input type="text" name="waktu_pemakaian" id="waktu_pemakaian"
                    value="{{ old('waktu_pemakaian', $aturanPakai->waktu_pemakaian) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block mb-1 font-semibold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('deskripsi', $aturanPakai->deskripsi) }}</textarea>
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
