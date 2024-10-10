<div class="container mx-auto p-4">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <nav class="top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8">
        <a href="/" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z"/>
            </svg>
        </a>
        <span class="text-black">›</span>
        <a href="{{ route('activities.activity') }}" wire:navigate class="text-black hover:text-gray-700">Kegiatan</a>
        <span class="text-black">›</span>
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Tambah Kegiatan</span>
    </nav>
    
    <h1 class="text-2xl font-semibold mb-4">Buat Kegiatan Baru</h1>
    <form wire:submit.prevent="save" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium mb-2">Foto Thumbnail *</label>
            <input type="file" wire:model="photo" class="border p-2 rounded w-full @error('photo') border-red-500 @enderror">
            @error('photo')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium mb-2">Judul Kegiatan *</label>
            <input type="text" wire:model="title" value="{{ old('title') }}" class="border p-2 rounded w-full @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium mb-2">Tags *</label>
            <input type="text" wire:model="tags" value="{{ old('tags') }}" placeholder="Contoh: Bank BJB, Cirebon" class="border p-2 rounded w-full @error('tags') border-red-500 @enderror">
            @error('tags')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium mb-2">Deskripsi *</label>
            <textarea id="editor" wire:model="description" rows="5" class="border p-2 rounded w-full @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium mb-2">Status *</label>
            <select wire:model="status" class="border p-2 rounded w-full @error('status') border-red-500 @enderror">
                <option value="Pilih Status">Pilih Status</option>
                <option value="Draft">Draft</option>
                <option value="Terbit">Terbit</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Buat Kegiatan
            </button>
            <a href="{{ route('activities.activity') }}" wire:navigate class="text-gray-500 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    function initializeEditor() {
        if (document.querySelector('#editor')) {
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData());
                    });

                })
                .catch(error => {
                    console.error('CKEditor tidak dapat diinisialisasi:', error);
                });
        }
    }

    // Inisialisasi CKEditor saat halaman pertama kali dimuat
    document.addEventListener('livewire:load', function () {
        initializeEditor();
    });

    // Inisialisasi ulang CKEditor setelah Livewire melakukan perubahan pada DOM
    document.addEventListener('livewire:update', function () {
        initializeEditor();
    });
</script>
