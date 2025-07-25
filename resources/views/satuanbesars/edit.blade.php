<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Edit Satuan Besar</h2>
    </x-slot>

   <div class="p-6 text-white">
    <form action="{{ route('satuanbesars.update', $satuanbesars->id) }}" method="POST"
        class="bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label  for="nama" class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="nama" id="nam"
                    value="{{ old('nama', $satuanbesars->nama) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="block mb-1 font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $satuanbesars->deskripsi) }}
            </textarea>
        </div>

        <div class="mb-3">
            <label>Jumlah Satuan Kecil</label>
            <input type="text" name="jumlah_satuankecil" class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('jumlah_satuankecil', $satuanbesars->jumlah_satuankecil) }}" 
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
