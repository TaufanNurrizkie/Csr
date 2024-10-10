@extends('layout')

@section('content')
@vite('resources/css/app.css')

<div class="container mx-auto p-6 bg-gray-100">
    <h1 class="text-2xl font-semibold mb-4">Tambah Mitra</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-600 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('mitra.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="border-dashed border-2 border-gray-300 rounded-lg h-48 flex items-center justify-center cursor-pointer">
            <label for="foto" class="w-full h-full flex items-center justify-center cursor-pointer">
                <input type="file" id="foto" name="foto" class="hidden" accept="image/*" required>
                <span class="text-gray-500">Klik untuk unggah atau seret dan lepas kesini (PNG, JPG up to 10MB)</span>
            </label>
        </div>

        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="nama_pt" class="block text-gray-700">Nama PT</label>
            <input type="text" name="nama_pt" id="nama_pt" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
        </div>

        <div class="mb-4">
            <label for="no_telp" class="block text-gray-700">No Telepon</label>
            <input type="number" name="no_telp" id="no_telp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
        </div>


        <div class="mb-4">
            <label for="status" class="block text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                <option value="Aktif">Aktif</option>
                <option value="Non-Aktif">Non-Aktif</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Mitra</button>
    </form>

    <div class="mt-6">
        <a href="{{ url('/mitra') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Kembali</a>
    </div>
</div>

@endsection
