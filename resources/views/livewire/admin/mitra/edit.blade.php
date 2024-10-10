<div class="container mx-auto p-6 bg-gray-100">
    <nav class=" top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8">
        <a href="/dashboard" wire:navigate class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z"/>
            </svg>
        </a>
        <span class="text-black">›</span>
        <a href="{{ route('mitra.index') }}" wire:navigate class="text-black hover:text-gray-700">Mitra</a>
        <span class="text-black">›</span>
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Edit</span>
    </nav>
    <h2 class="text-2xl font-semibold mb-4">Ubah Profil Mitra</h2>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-100 text-red-700 p-4 rounded">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-600 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md space-y-4">
        <!-- Foto Mitra -->
        <div class="flex flex-col mb-4">
            <label for="foto" class="block text-gray-700">Foto Mitra</label>
            <input type="file" id="foto" wire:model="foto" class="hidden">
            <div class="border-dashed border-2 border-gray-300 rounded-lg h-48 flex items-center justify-center cursor-pointer" 
                 onclick="document.getElementById('foto').click()">
                <span class="text-gray-500">Klik untuk unggah atau seret dan lepas kesini (PNG, JPG up to 10MB)</span>
            </div>

            @if ($mitra->foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama }}" class="w-32 h-32 object-cover rounded mt-2">
                </div>
            @endif

            @error('foto') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Nama Mitra dan Nama PT -->
        <div class="flex space-x-4 mb-4">
            <div class="flex-1">
                <label for="nama" class="block text-gray-700">Nama Mitra</label>
                <input type="text" wire:model="nama" id="nama" class="mt-1 p-2 border rounded w-full">
                @error('nama') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex-1">
                <label for="nama_pt" class="block text-gray-700">Nama PT</label>
                <input type="text" wire:model="nama_pt" id="nama_pt" class="mt-1 p-2 border rounded w-full">
                @error('nama_pt') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Email dan No Telepon -->
        <div class="flex space-x-4 mb-4">
            <div class="flex-1">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" wire:model="email" id="email" class="mt-1 p-2 border rounded w-full">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex-1">
                <label for="no_telp" class="block text-gray-700">No Telepon</label>
                <input type="text" wire:model="no_telp" id="no_telp" class="mt-1 p-2 border rounded w-full">
                @error('no_telp') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Alamat dan Deskripsi -->
        <div class="flex space-x-4 mb-4">
            <div class="flex-1">
                <label for="alamat" class="block text-gray-700">Alamat</label>
                <textarea wire:model="alamat" id="alamat" rows="4" class="mt-1 p-2 border rounded w-full"></textarea>
                @error('alamat') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex-1">
                <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                <textarea wire:model="deskripsi" id="deskripsi" rows="4" class="mt-1 p-2 border rounded w-full"></textarea>
                @error('deskripsi') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="mt-4 flex justify-end">
            <a href="{{ route('mitra.index') }}" wire:navigate class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Kembali</a>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
