<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Edit Kemasan</h2>
    </x-slot>

    <div class="p-6 text-white">
        <form action="{{ route('kemasans.update', $kemasan->id) }}" method="POST"
            class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Nama Kemasan -->
            <div class="mb-4">
                <label for="nama_kemasan" class="block mb-1 font-semibold">Nama Kemasan</label>
                <input type="text" name="nama_kemasan" id="nama_kemasan"
                    value="{{ old('nama_kemasan', $kemasan->nama_kemasan) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Tanggal Produksi -->
            <div class="mb-4">
                <label for="tanggal_produksi" class="block mb-1 font-semibold">Tanggal Produksi</label>
                <input type="date" name="tanggal_produksi" id="tanggal_produksi"
                    value="{{ old('tanggal_produksi', $kemasan->tanggal_produksi) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Tanggal Kadaluarsa -->
            <div class="mb-4">
                <label for="tanggal_kadaluarsa" class="block mb-1 font-semibold">Tanggal Kadaluarsa</label>
                <input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa"
                    value="{{ old('tanggal_kadaluarsa', $kemasan->tanggal_kadaluarsa) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Petunjuk Penyimpanan -->
            <div class="mb-4">
                <label for="petunjuk_penyimpanan" class="block mb-1 font-semibold">Petunjuk Penyimpanan</label>
                <input type="text" name="petunjuk_penyimpanan" id="petunjuk_penyimpanan"
                    value="{{ old('petunjuk_penyimpanan', $kemasan->petunjuk_penyimpanan) }}"
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