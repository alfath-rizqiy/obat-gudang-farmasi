<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Tambah Aturan Pakai</h2>
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

        <form class="bg-gray-800 p-6 rounded-lg shadow-md" method="POST" action="{{ route('aturanpakais.store') }}">
            @csrf

            <!-- Frekuensi Pemakaian -->
            <div class="mb-4">
                <label for="frekuensi_pemakaian" class="block mb-1 font-semibold">Frekuensi Pemakaian</label>
                <input type="text" name="frekuensi_pemakaian" id="frekuensi_pemakaian"
                    value="{{ old('frekuensi_pemakaian') }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Waktu Pemakaian -->
            <div class="mb-4">
                <label for="waktu_pemakaian" class="block mb-1 font-semibold">Waktu Pemakaian</label>
                <input type="text" name="waktu_pemakaian" id="waktu_pemakaian"
                    value="{{ old('waktu_pemakaian') }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block mb-1 font-semibold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('deskripsi') }}</textarea>
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