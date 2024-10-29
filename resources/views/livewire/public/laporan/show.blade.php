<div>
    <div class="hero-section relative w-full h-[450px] overflow-hidden -mt-5"> <!-- -mt-10 untuk menggeser ke atas -->
        <svg width="550" height="450" viewBox="0 0 602 450" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="absolute inset-0">
            <rect width="602" height="450" fill="#510300" />
        </svg>
        <!-- Adjust the size and position of the gray overlay -->

        <div class="absolute inset-0"
            style="top: 50%; left: 50%;  width: 93%; height: 70%; transform: translate(-50%, -50%);">
            <img src="{{ asset('backgroundPublic.png') }}" alt="Overlay Image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-70"></div>
        </div>
        <div class="absolute inset-0 flex items-center justify-start pl-20"
            style="top: 50%; transform: translateY(-50%);">
            <div class="relative z-10 text-white text-left flex flex-col ml-20"> <!-- Menambahkan margin kiri -->
                <p class="text-lg">
                    <a href="/" class="text-[#E66445]">Beranda</a> /
                    <a href="/laporan" class="text-[#E66445]">Laporan</a> /   <span class="text-white">Rincian</span>
                </p>
                <h1 class="text-7xl font-bold">{{ $laporan->title }}</h1>
                <p class="mt-2 text-sm">{{ $laporan->mitra }} · {{ $laporan->created_at->format('F d, Y') }}</p>
                <span class="bg-[#F2F4F74D] text-white px-4 py-1 rounded-full mt-5 w-20">
                    {{ optional($laporan->sektor)->nama ?? 'Sektor tidak tersedia' }}
                </span>
            </div>
        </div>
    </div>
    <div class="w-10 h-1 bg-[#FF5D56] mb-20 mt-10 ml-20"></div>
    <div class=" text-white">
        <!-- Header Section -->
        <div class="flex justify-center items-center mb-20">
            <img src="{{'../storage/' . $laporan->foto }}" alt="L'Oréal Logo" class="w-1/4">
        </div>
    
        <!-- Galeri Section -->
        <div class="px-8">
            <h2 class="text-lg font-semibold mb-4 text-black">Galeri</h2>
            <div class="flex gap-4 mb-6">
                <!-- Galeri Images -->
                <div class="w-1/4">
                    <img src="https://via.placeholder.com/300x200" alt="Image 1" class="rounded-lg">
                </div>
                <div class="w-1/4">
                    <img src="https://via.placeholder.com/300x200" alt="Image 2" class="rounded-lg">
                </div>
                <div class="w-1/4">
                    <img src="https://via.placeholder.com/300x200" alt="Image 3" class="rounded-lg">
                </div>
                <div class="w-1/4">
                    <img src="https://via.placeholder.com/300x200" alt="Image 4" class="rounded-lg">
                </div>
            </div>
    
            <!-- Kartu Laporan Section -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <!-- Kartu 1: Realisasi -->
                <div class="bg-pink-100 p-4 rounded-lg shadow-md relative max-w-md">
                    <!-- Lekukan Kiri -->
                    <div class="absolute top-0 bottom-0 left-0 w-1 bg-[#98100A] rounded-l-lg"></div>
                    
                    <!-- Isi Kartu -->
                    <h3 class="text-gray-500 text-sm">Realisasi</h3>
                    <p class="text-lg font-semibold text-gray-800">Rp {{ number_format($laporan->realisasi, 0, ',', '.') }}</p>
                </div>
                
                <!-- Kartu 2: Nama Proyek -->
                <div class="bg-pink-100 p-4 rounded-lg shadow-md relative max-w-md">
                    <!-- Lekukan Kiri -->
                    <div class="absolute top-0 bottom-0 left-0 w-1 bg-[#98100A] rounded-l-lg"></div>
                    
                    <!-- Isi Kartu -->
                    <h3 class="text-gray-500 text-sm">Nama Proyek</h3>
                    <p class="text-lg font-semibold text-gray-800">{{ $laporan->title }}</p>
                </div>
                
                <!-- Kartu 3: Kecamatan -->
                <div class="bg-pink-100 p-4 rounded-lg shadow-md relative max-w-md">
                    <!-- Lekukan Kiri -->
                    <div class="absolute top-0 bottom-0 left-0 w-1 bg-[#98100A] rounded-l-lg"></div>
                    
                    <!-- Isi Kartu -->
                    <h3 class="text-gray-500 text-sm">Kecamatan</h3>
                    <p class="text-lg font-semibold text-gray-800">{{ $laporan->lokasi }}</p>
                </div>
            </div>
            
        </div>
    
       
    </div>
     <!-- Rincian Laporan Section -->
     <div class="px-8 pb-16">
        <h2 class="text-3xl font-semibold mb-4">Rincian Laporan</h2>
        <p class="text-gray-400 leading-relaxed">
            {{ $laporan->deskripsi }}
        </p>

    </div>
    <div class="max-w-7xl  py-12 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
         <span class="border-b-4 border-red-500 mr-2">
         </span>
         Laporan Lainnya
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <a href="{{ route('laporan.detail', $laporan->id) }}" class="bg-white shadow-md rounded-lg overflow-hidden relative">
                <img alt="Laporan Image" class="w-full h-48 object-cover" height="400" src="{{'../storage/' . $laporan->foto ?? 'https://via.placeholder.com/600x400' }}" width="600"/>
                <div class="absolute top-3 left-2 bg-red-600 text-white px-3 py-1 text-xs rounded">
                    {{ \Carbon\Carbon::parse($laporan->tgl_realisasi)->format('d F, Y') }}
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        {{ $laporan->title }} <!-- Assuming 'title' is a column in your laporan table -->
                    </h3>
                    <p class="text-gray-600 text-sm">
                        {{ Str::limit($laporan->deskripsi, 100, '...') }} <!-- Assuming 'description' is a column in your laporan table -->
                    </p>
                </div>
            </a>            
        </div>
        
        <div class="mt-8 text-center">
         <a href="/laporan" class="bg-white text-gray-900 border border-gray-300 rounded-full px-6 py-2 text-sm font-medium hover:bg-gray-100">
          Lihat semua laporan
         </a >
        </div>
       </div>
</div>
