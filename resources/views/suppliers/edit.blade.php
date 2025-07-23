<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold text-xl">Edit supplier</h2>
    </x-slot>

    <div class="p-6 text-white">
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST"
            class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_supplier" class="block mb-1 font-semibold">Nama Supplier</label>
                <input type="text" name="nama_supplier" id="nama_supplier"
                    value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="telepon" class="block mb-1 font-semibold">Telepon</label>
                <input type="number" name="telepon" id="telepon"
                    value="{{ old('telepon', $supplier->telepon) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block mb-1 font-semibold">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                    value="{{ old('alamat', $supplier->alamat) }}"
                    class="w-full p-2 bg-gray-900 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="produksi" class="block mb-1 font-semibold">Produksi</label>
                <input type="number" name="produksi" id="produksi"
                    value="{{ old('produksi', $supplier->produksi) }}"
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
