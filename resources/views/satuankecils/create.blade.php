<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray font-semibold text-xl">Tambah Satuan Kecil</h2>
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

    <form class="bg-gray-800 p-6 rounded-lg shadow-md" action="{{ route('satuankecils.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="nama" class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-3">
            <label class="block mb-1 font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi') }}" ></textarea>
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
