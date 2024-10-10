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

    <form wire:submit.prevent="updateActivity" enctype="multipart/form-data">
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Foto Thumbnail *</label>
            <input type="file" wire:model="photo" class="border p-2 rounded w-full" />
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Judul Kegiatan *</label>
            <input type="text" wire:model="title" class="border p-2 rounded w-full" required />
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Tags *</label>
            <input type="text" wire:model="tags" class="border p-2 rounded w-full" required />
        </div>
    
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Deskripsi *</label>
            <textarea id="editor" wire:model.defer="description" rows="5" class="border p-2 rounded w-full" required></textarea>
        </div>
    
        <div class="flex justify-between items-center">
            <div class="flex gap-4">
                <button type="submit" name="action" value="publish" wire:click="$set('status', 'Terbit')" class="bg-red-600 text-white px-4 py-2 rounded">Terbitkan Kegiatan</button>
                <button type="submit" name="action" value="draft" wire:click="$set('status', 'Draft')" class="bg-gray-500 text-white px-4 py-2 rounded">Simpan Sebagai Draft</button>
            </div>
            <a href="{{ route('activities.activity') }}" wire:navigate class="text-gray-500 hover:text-gray-800">Batal</a>
        </div>
        
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
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
