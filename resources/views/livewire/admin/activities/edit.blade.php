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
        <a href="{{ route('activities.activity') }}" wire:navigate class="text-black hover:text-gray-700">Kegiatan</a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <!-- Detail -->
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Ubah Kegiatan</span>
    </nav>
    
    <h1 class="text-2xl font-semibold mb-4">Ubah Kegiatan</h1>

    <form wire:submit.prevent="updateActivity" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Ubah Kegiatan</h2>
    
        <!-- Foto Thumbnail -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Foto Thumbnail *</label>
            <div class="flex items-center justify-center w-full">
                <label for="photo-upload" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 cursor-pointer hover:border-blue-400">
                    <span class="text-sm text-gray-600">Klik untuk unggah atau seret dan lepas kesini</span>
                    <span class="text-xs text-gray-400">PNG, JPG up to 10MB</span>
                    <input id="photo-upload" type="file" wire:model="photo" class="hidden" />
                </label>
            </div>
            @error('photo')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Judul Kegiatan -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Judul Kegiatan *</label>
            <input type="text" wire:model="title" class="border p-2 rounded w-full @error('title') border-red-500 @enderror" required />
            @error('title')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Tags -->
       <div class="mb-4">
    <label class="block text-sm font-medium mb-2">Tags *</label>
    <div class="border p-2 rounded w-full flex items-center flex-wrap gap-2 @error('tags') border-red-500 @enderror">
        <!-- Loop through tags and display each as a badge -->
        @foreach (explode(',', $tags) as $tag)
            <span class="bg-[#28458B] text-white px-2 py-1 rounded-[6px] text-sm">{{ trim($tag) }}</span>
        @endforeach
    </div>
    <input type="text" wire:model="tags" placeholder="Tambah tag" class="focus:outline-none ml-2 w-full" required />
    @error('tags')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

    
        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Deskripsi *</label>
            <textarea id="editor" wire:model.defer="description" rows="5" class="border p-2 rounded w-full @error('description') border-red-500 @enderror" required></textarea>
            @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center">
            <div class="flex gap-4">
                <button type="submit" name="action" value="publish" wire:click="$set('status', 'Terbit')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Terbitkan Kegiatan</button>
                <button type="submit" name="action" value="draft" wire:click="$set('status', 'Draft')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Simpan Sebagai Draft</button>
            </div>
            <a href="{{ route('activities.activity') }}" wire:navigate class="text-gray-500 hover:text-gray-800">Batal</a>
        </div>
    </form>
    
</div>


<script>
    document.addEventListener('livewire:load', function () {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
