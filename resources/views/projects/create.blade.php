@extends('layout')

@section('content')

@vite('resources/css/app.css')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Buat Proyek Baru</h1>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" id="judul" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>
    
        <div class="mb-4">
            <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>
    
        <div class="mb-4">
            <label for="jumlah_mitra" class="block text-sm font-medium text-gray-700">Jumlah Mitra</label>
            <input type="number" name="jumlah_mitra" id="jumlah_mitra" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>
    
        <div class="mb-4">
            <label for="tgl_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
            <input type="date" name="tgl_mulai" id="tgl_mulai" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>
    
        <div class="mb-4">
            <label for="tgl_akhir" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
            <input type="date" name="tgl_akhir" id="tgl_akhir" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>
    
        <div class="mb-4">
            <label for="tgl_diterbitkai" class="block text-sm font-medium text-gray-700">Tanggal Diterbitkan</label>
            <input type="date" name="tgl_diterbitkai" id="tgl_diterbitkai" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>
    
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
                <option value="draf">Draf</option>
                <option value="terbit">Terbit</option>
            </select>
        </div>
    
        <!-- Tombol Simpan Proyek -->
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">
            Simpan Proyek
        </button>
        
    </form>
</div>

@endsection
