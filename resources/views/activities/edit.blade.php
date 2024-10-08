@extends('layout')

@section('content')

@vite('resources/css/app.css')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Ubah Kegiatan</h1>

    <form action="{{ route('activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data" id="activityForm">
        @csrf
        @method('PUT')
    
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Foto Thumbnail *</label>
            <input type="file" name="photo" class="border p-2 rounded w-full" />
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Judul Kegiatan *</label>
            <input type="text" name="title" value="{{ old('title', $activity->title) }}" class="border p-2 rounded w-full" required />
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Tags *</label>
            <input type="text" name="tags" value="{{ old('tags', $activity->tags) }}" class="border p-2 rounded w-full" required />
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Deskripsi *</label>
            <textarea id="editor" name="description" rows="5" class="border p-2 rounded w-full" required>{{ old('description', $activity->description) }}</textarea>
        </div>
    
        <div class="flex gap-4">
            <button type="submit" name="action" value="publish" class="bg-red-600 text-white px-4 py-2 rounded">Terbitkan Kegiatan</button>
            <button type="submit" name="action" value="draft" class="bg-gray-500 text-white px-4 py-2 rounded">Simpan Sebagai Draft</button>
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
