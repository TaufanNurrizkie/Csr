<div class="container mx-auto p-4">
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
        <a href="{{ route('sektor.index') }}" wire:navigate class="bg-red-600 text-white px-4 py-2 rounded">Kembali ke Daftar Sektor</a>
    </div>
</div>
