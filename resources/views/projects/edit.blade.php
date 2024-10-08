@extends('layout')

@section('content')
@vite('resources/css/app.css')
<div class="container mx-auto p-4">
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
