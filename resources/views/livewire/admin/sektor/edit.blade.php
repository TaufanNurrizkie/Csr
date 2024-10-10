<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Edit Sektor</h1>

    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Foto Thumbnail *</label>
            <div class="border-dashed border-2 border-gray-300 rounded p-4 text-center mb-2">
                @if ($thumbnailUrl)
                    <img src="{{ $thumbnailUrl }}" alt="Thumbnail" class="w-full h-auto mb-2" />
                @endif
                <input type="file" wire:model="thumbnail" id="thumbnail" accept="image/png, image/jpeg" class="hidden" />
                <label for="thumbnail" class="cursor-pointer text-red-600">Klik untuk unggah atau seret dan lepas kesini (PNG, JPG max 10MB)</label>
                @error('thumbnail') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Sektor *</label>
            <input type="text" wire:model="nama" id="name" required class="border p-2 rounded w-full" placeholder="Nama Sektor" />
            @error('nama') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea wire:model="deskripsi" id="description" rows="4" class="border p-2 rounded w-full" placeholder="Masukkan Deskripsi"></textarea>
            @error('deskripsi') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
       <div class="flex justify-between items-center">
    <div>
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('sektor.index') }}" wire:navigate class="text-gray-500 hover:text-gray-700 ml-4">Batal</a>
    </div>
   <button type="button" 
        class="bg-red-700 text-white px-4 py-2 rounded ml-4" 
        @click="$dispatch('confirm-delete')">Hapus</button>
</div>
    </form>

    <x-confirm-delete />
</div>
