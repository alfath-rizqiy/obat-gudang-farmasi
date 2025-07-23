<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Tambah Obat</h2>
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

        <form method="POST" action="{{ route('obat.store') }}" class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block mb-1 font-semibold">Nama Obat</label>
                <input type="text" name="nama" id="nama"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block mb-1 font-semibold">kategori Obat</label>
                <input type="text" name="kategori" id="kategori"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="stok" class="block mb-1 font-semibold">Stok Obat</label>
                <input type="number" name="stok" id="stok"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="harga" class="block mb-1 font-semibold">Harga Obat</label>
                <input type="number" name="harga" id="harga"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="supplier_id" class="block mb-1 font-semibold">Supplier</label>
                 <select name="supplier_id" class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
    <option value="">-- Pilih Supplier --</option>
    @foreach($suppliers as $supplier)
        <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
    @endforeach
</select>

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
