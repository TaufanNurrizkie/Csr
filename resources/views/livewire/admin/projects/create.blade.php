<div class="container mx-auto p-4">
    <nav class=" top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8">
        <a href="/" wire:navigate class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z"/>
            </svg>
        </a>
        <span class="text-black">›</span>
        <a href="{{ route('projects.index') }}" wire:navigate class="text-black hover:text-gray-700">Proyek</a>
        <span class="text-black">›</span>
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Buat Proyek Baru</span>
    </nav>
    <h1 class="text-2xl font-semibold mb-4">Buat Proyek Baru</h1>
    <form wire:submit.prevent="store" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium mb-2">Upload Foto Proyek *</label>
            <input type="file" wire:model="photo" multiple class="border p-2 rounded w-full @error('photo.*') border-red-500 @enderror">
            @error('photo.*')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        
            <!-- Show photo previews if selected -->
            @if ($photo)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                    @foreach ($photo as $photos)
                        <img src="{{ $photos->temporaryUrl() }}" alt="Preview" class="h-32 w-32 rounded object-cover">
                    @endforeach
                </div>
            @endif
        </div>
        

        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium mb-2">Judul Proyek *</label>
            <input type="text" wire:model.defer="judul" class="border p-2 rounded w-full @error('judul') border-red-500 @enderror" required>
            @error('judul')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="lokasi" class="block text-sm font-medium mb-2">Lokasi *</label>
            <input type="text" wire:model.defer="lokasi" class="border p-2 rounded w-full @error('lokasi') border-red-500 @enderror" required>
            @error('lokasi')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium mb-2">Deskripsi *</label>
            <input type="text" wire:model.defer="deskripsi" class="border p-2 rounded w-full @error('deskripsi') border-red-500 @enderror" required>
            @error('deskripsi')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="sektor_id" class="block text-sm font-medium mb-2">Sektor *</label>
            <select name="sektor_id" wire:model="sektor_id" class="border p-2 rounded w-full @error('sektor_id') border-red-500 @enderror" required>
                <option value="">Pilih Sektor</option>
                @foreach($sektors as $sektor)
                    <option value="{{ $sektor->id }}" {{ old('sektor_id') == $sektor->id ? 'selected' : '' }}>
                        {{ $sektor->nama }}
                    </option>
                @endforeach
            </select>
            @error('sektor_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tgl_mulai" class="block text-sm font-medium mb-2">Tanggal Mulai *</label>
            <input type="date" wire:model.defer="tgl_mulai" class="border p-2 rounded w-full @error('tgl_mulai') border-red-500 @enderror" required>
            @error('tgl_mulai')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tgl_akhir" class="block text-sm font-medium mb-2">Tanggal Akhir *</label>
            <input type="date" wire:model.defer="tgl_akhir" class="border p-2 rounded w-full @error('tgl_akhir') border-red-500 @enderror" required>
            @error('tgl_akhir')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Buat Proyek</button>
            <a href="{{ route('projects.index') }}" wire:navigate class="text-gray-500 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>
