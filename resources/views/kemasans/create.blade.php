<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Tambah Kemasan</h2>
    </x-slot>

    <div class="p-6 text-white">
        @if ($errors->any())
            <div class="mb-4 bg-red-600 text-white p-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="bg-gray-800 p-6 rounded-lg shadow-md" method="POST" action="{{ route('kemasans.store') }}">
            @csrf

            <!-- Nama Kemasan -->
            <div class="mb-4">
                <label for="nama_kemasan" class="block mb-1 font-semibold">Nama Kemasan</label>
                <input type="text" name="nama_kemasan" id="nama_kemasan"
                    value="{{ old('nama_kemasan') }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Tanggal Produksi -->
            <div class="mb-4">
                <label for="tanggal_produksi" class="block mb-1 font-semibold">Tanggal Produksi</label>
                <input type="date" name="tanggal_produksi" id="tanggal_produksi"
                    value="{{ old('tanggal_produksi') }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Tanggal Kadaluarsa -->
            <div class="mb-4">
                <label for="tanggal_kadaluarsa" class="block mb-1 font-semibold">Tanggal Kadaluarsa</label>
                <input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa"
                    value="{{ old('tanggal_kadaluarsa') }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Petunjuk Penyimpanan -->
            <div class="mb-4">
                <label for="petunjuk_penyimpanan" class="block mb-1 font-semibold">Petunjuk Penyimpanan</label>
                <input type="text" name="petunjuk_penyimpanan" id="petunjuk_penyimpanan"
                    value="{{ old('petunjuk_penyimpanan') }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>