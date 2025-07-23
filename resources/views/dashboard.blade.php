<x-app-layout>
    <x-slot name="header">
        <h2 class="text-gray font-semibold text-xl">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   

    <div class="container bg-gray-100 p-6 rounded-lg shadow-md">
        <h1 class="text-gray italic font-bold">Halo, {{ Auth::user()->name }}</h1>

        @role('admin')
            <p class="text-gray-80">Ini adalah dashboard khusus Admin. Kamu bisa mengelola seluruh sistem.</p>
        @endrole

        @role('petugas')
            <p>Ini adalah dashboard khusus Petugas. Kamu bisa input dan lihat data saja.</p>
        @endrole

        @unlessrole('admin|petugas')
            <p>Role kamu belum dikenali oleh sistem.</p>
        @endunlessrole 

    </div>
</x-app-layout>
