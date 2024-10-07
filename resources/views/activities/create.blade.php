@vite('resources/css/app.css')

@extends('layout')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Buat Kegiatan Baru</h1>
    <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium mb-2">Foto Thumbnail *</label>
            <input type="file" name="photo" class="border p-2 rounded w-full @error('photo') border-red-500 @enderror">
            @error('photo')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium mb-2">Judul Kegiatan *</label>
            <input type="text" name="title" value="{{ old('title') }}" class="border p-2 rounded w-full @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium mb-2">Tags *</label>
            <input type="text" name="tags" value="{{ old('tags') }}" placeholder="Contoh: Bank BJB, Cirebon" class="border p-2 rounded w-full @error('tags') border-red-500 @enderror">
            @error('tags')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium mb-2">Deskripsi *</label>
            <textarea id="editor" name="description" rows="5" class="border p-2 rounded w-full @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium mb-2">Status *</label>
            <select name="status" class="border p-2 rounded w-full @error('status') border-red-500 @enderror">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Terbit</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Buat Kegiatan
            </button>
            <a href="{{ route('activities.activity') }}" class="text-gray-500 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
