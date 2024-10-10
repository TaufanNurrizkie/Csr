<div class="container mx-auto p-6 bg-gray-100">
    <nav class="top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded my-8">
        <!-- Icon home -->
        <a href="/" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z"/>
            </svg>
        </a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <!-- Kegiatan link -->
        <a href="{{ route('mitra.index') }}" class="text-black hover:text-gray-700">Mitra</a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <!-- Detail -->
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Detail</span>
    </nav>

    <!-- Profile Section -->
    <div class="flex justify-between">
        <!-- Foto -->
        <div class="w-1/3">
            <div class="w-full h-48 bg-gray-200 rounded-lg mb-4">
                @if($mitra->foto)
                    <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama }}" class="w-full h-full object-cover rounded-lg">
                @endif
            </div>
        </div>

        <!-- Detail Mitra -->
        <div class="w-2/3 ml-8">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="text-2xl font-semibold">{{ $mitra->nama }} 
                        <span class="ml-2 bg-green-100 text-green-600 py-1 px-3 rounded-full text-xs">Terverifikasi</span>
                    </h2>
                    <p class="text-gray-500">{{ $mitra->nama_pt }}</p>
                </div>
                <div>
                    <a href="{{ url('/mitra/'.$mitra->id.'/edit') }}" wire:navigate class="bg-red-500 text-white px-4 py-2 rounded">Ubah Profil</a>
                    <a href="{{ url('/mitra/'.$mitra->id.'/nonaktifkan') }}" class="bg-gray-200 text-red-500 px-4 py-2 rounded ml-2">Non-aktifkan mitra</a>
                </div>
            </div>

            <!-- Kontak Info -->
            <ul class="mb-4">
                <li class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12c2.21 0 4-1.79 4-4s-1.79-4-4-4c-2.21 0-4 1.79-4 4s1.79 4 4 4zm0 0v4m0 4h-4m8 0h-4m8 0h-4m0 0H4m8 0H4"></path>
                    </svg>
                    {{ $mitra->email }}
                </li>
                <li class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 11V7a5 5 0 00-10 0v4a5 5 0 00-1 4v1a4 4 0 003 4h8a4 4 0 003-4v-1a5 5 0 00-1-4zm0 0H7m10 0a5 5 0 01-1 4v1a4 4 0 01-1 3h-8a4 4 0 01-1-3v-1a5 5 0 011-4m10 0v0z"></path>
                    </svg>
                    {{ $mitra->no_telp }}
                </li>
                <li class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2c-1.7 0-3.2.6-4.4 1.8C5.6 5 5 6.5 5 8.2v8.6c0 1.7.6 3.2 1.8 4.4C8.8 22.4 10.3 23 12 23s3.2-.6 4.4-1.8C18.4 19.9 19 18.4 19 16.8V8.2c0-1.7-.6-3.2-1.8-4.4C15.2 2.6 13.7 2 12 2z"></path>
                    </svg>
                    {{ $mitra->alamat }}
                </li>
            </ul>

            <!-- Deskripsi Mitra -->
            <p class="max-h-24 overflow-hidden text-ellipsis">{{ $mitra->deskripsi }}</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="mt-6">
        <a href="{{ url('/mitra') }}" wire:navigate class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Kembali Ke Halaman Utama</a>
    </div>
</div>
