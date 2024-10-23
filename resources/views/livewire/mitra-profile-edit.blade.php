<div class="bg-gray-100 py-10">
    <nav class="mb-8 flex items-center space-x-2 text-lg px-3 py-1 rounded justify-start ml-20">
        <a href="/mitra/dashboard" wire:navigate class="text-black">
            <img src="{{ asset('home.png') }}" alt="" class="w-8 h-8" >
        </a>
        <span class="text-black">›</span>
        <a href="/profil-mitra" wire:navigate class="text-black hover:text-gray-700">Profile</a>
        <span class="text-black">›</span>
        <span class="bg-red-100 text-[#98100A] px-3 py-1 rounded font-extrabold">ubah Profile</span>
    </nav>
    <h3 class="text-2xl font-bold mb-6 ml-24">Ubah Profile</h3>
    <div class="max-w-6xl mx-auto p-8 bg-white rounded-lg shadow-lg">


        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="update" enctype="multipart/form-data" class="space-y-6">
            <!-- Foto -->
            <div class="grid grid-cols-2 gap-8 mb-6">
                <!-- Bagian kiri untuk preview image -->
                <div class="flex justify-center items-center bg-gray-200 rounded-lg w-full h-64 relative">
                    @if ($foto)
                        <img src="{{ $foto->temporaryUrl() }}" class="w-full h-full object-cover rounded">
                    @elseif (Auth::user()->mitra->foto)
                        <img src="{{ asset('storage/' . Auth::user()->mitra->foto) }}" class="w-full h-full object-cover rounded">
                    @endif
                </div>

                <!-- Bagian kanan untuk instruksi unggah -->
                <div class="flex flex-col justify-center items-center border-2 border-dashed border-gray-300 rounded-lg w-full h-64">
                    <label for="foto" class="text-[#98100A] cursor-pointer">
                        <img src="{{ asset('download.png') }}" alt="" class="h-12 w-12 ml-10">
                        Klik untuk unggah
                    </label>
                    <p class="text-gray-500">atau seret dan lepas kesini</p>
                    <p class="text-gray-500">PNG, JPG up to 10MB</p>
                    <input type="file" wire:model="foto" id="foto" class="hidden">
                </div>
            </div>

            <!-- Form Fields -->
            <div class="grid grid-cols-2 gap-8">
                <!-- Nama Mitra -->
                <div>
                    <label for="nama_mitra" class="block font-bold text-gray-700">Nama Mitra  <span class="text-[#98100A]">*</span></label>
                    <input type="text" wire:model="nama_mitra" class="w-full p-3 border border-gray-300 rounded">
                    @error('nama_mitra') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Nama PT -->
                <div>
                    <label for="nama_pt" class="block font-bold text-gray-700">Nama PT  <span class="text-[#98100A]">*</span></label>
                    <input type="text" wire:model="nama_pt" class="w-full p-3 border border-gray-300 rounded">
                    @error('nama_pt') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- No Telepon -->
                <div>
                    <label for="no_telepon" class="block font-bold text-gray-700">No Telepon  <span class="text-[#98100A]">*</span></label>
                    <input type="text" wire:model="no_telepon" class="w-full p-3 border border-gray-300 rounded">
                    @error('no_telepon') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block font-bold text-gray-700">Email  <span class="text-[#98100A]">*</span></label>
                    <input type="email" wire:model="email" class="w-full p-3 border border-gray-300 rounded">
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block font-bold text-gray-700">Alamat  <span class="text-[#98100A]">*</span></label>
                    <textarea wire:model="alamat" class="w-full p-3 border border-gray-300 rounded"></textarea>
                    @error('alamat') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block font-bold text-gray-700">Deskripsi  <span class="text-[#98100A]">*</span></label>
                    <textarea wire:model="deskripsi" class="w-full p-3 border border-gray-300 rounded"></textarea>
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end mt-6 space-x-4"> <!-- Tambahkan space-x-4 untuk jarak antara tombol -->
                <a href="/profil-mitra" wire:navigate  class="text-black px-6 py-3 rounded-lg border">
                    Kembali
                </a>
                <button type="submit" class="bg-[#98100A] text-white px-6 py-3 rounded-lg flex items-center">
                    <img src="{{ asset('draft-white.png') }}" alt="" class="h-7 w-7 mr-2">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
