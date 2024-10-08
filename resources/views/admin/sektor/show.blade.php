@extends('layout')
@section('content')

@vite('resources/css/app.css')

<div class="container mx-auto p-4">
    <nav class=" top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded">
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
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Detail</span>
    </nav>
    <h1 class="text-2xl font-semibold mb-4">Detail Sektor</h1>
    
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Foto Thumbnail</label>
        <div class="border-2 border-gray-300 rounded p-4 text-center mb-2">
            <img src="{{ asset('storage/' . $sektor->thumbnail) }}" alt="{{ $sektor->nama }}" class="w-full h-auto" />
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Sektor</label>
        <p class="border p-2 rounded w-full">{{ $sektor->nama }}</p>
    </div>
    
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea rows="4" class="border p-2 rounded w-full" readonly>{{ $sektor->deskripsi }}</textarea>
    </div>

    <div>
        <a href="{{ route('sektor.index') }}" class="bg-red-600 text-white px-4 py-2 rounded">Kembali ke Daftar Sektor</a>
    </div>
</div>

@endsection
