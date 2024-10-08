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
    <h1 class="text-2xl font-semibold">Edit Proyek: {{ $project->judul }}</h1>
    <!-- Form edit proyek -->
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Ini memberitahu Laravel bahwa kita menggunakan metode PUT -->
        <div class="mb-4">
            <label for="judul" class="block text-gray-700">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ $project->judul }}" class="border rounded w-full" required>
        </div>
        <!-- Tambahkan input lainnya sesuai kebutuhan -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
    
</div>
@endsection
