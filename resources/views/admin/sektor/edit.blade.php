@extends('layout')
@section('content')

@vite('resources/css/app.css')

<div class="container mx-auto p-4">
    <nav class=" top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8">
        <!-- Icon home -->
        <a href="/" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z"/>
            </svg>
        </a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <!-- Kegiatan link -->
        <a href="{{ route('sektor.index') }}" class="text-black hover:text-gray-700">Sektor</a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <!-- Detail -->
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Ubah Sektor</span>
    </nav>
    <h1 class="text-2xl font-semibold mb-4">Edit Sektor</h1>
    
    <form action="{{ route('sektor.update', $sektor->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Foto Thumbnail *</label>
            <div class="border-dashed border-2 border-gray-300 rounded p-4 text-center mb-2">
                <img src="{{ asset('storage/' . $sektor->thumbnail) }}" alt="{{ $sektor->nama }}" class="w-full h-auto mb-2" />
                <input type="file" name="thumbnail" id="thumbnail" accept="image/png, image/jpeg" class="hidden" />
                <label for="thumbnail" class="cursor-pointer text-red-600">Klik untuk unggah atau seret dan lepas kesini (PNG, JPG max 10MB)</label>
            </div>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Sektor *</label>
            <input type="text" name="nama" id="name" required class="border p-2 rounded w-full" placeholder="Nama Sektor" value="{{ $sektor->nama }}" />
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="description" rows="4" class="border p-2 rounded w-full" placeholder="Masukkan Deskripsi">{{ $sektor->deskripsi }}</textarea>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('sektor.index') }}" class="text-gray-500 hover:text-gray-700 ml-4">Batal</a>
            </div>
            <form action="{{ route('sektor.destroy', $sektor->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sektor ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Hapus Sektor</button>
            </form>
        </div>

    <div class="mt-4">
        
    </div>
</div>
@endsection
