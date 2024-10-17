<div class="bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="hero-section relative w-full h-[450px] overflow-hidden -mt-5"> <!-- -mt-10 untuk menggeser ke atas -->
        <svg width="550" height="450" viewBox="0 0 602 450" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0">
            <rect width="602" height="450" fill="#510300"/>
        </svg>
        <!-- Adjust the size and position of the gray overlay -->

        <div class="absolute inset-0" style="top: 50%; left: 50%;  width: 93%; height: 70%; transform: translate(-50%, -50%);">
            <img src="{{ asset('backgroundPublic.png') }}" alt="Overlay Image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-70"></div>
        </div>
        <div class="absolute inset-0 flex items-center justify-start pl-20" style="top: 50%; transform: translateY(-50%);">
            <div class="relative z-10 text-white text-left flex flex-col ml-20"> <!-- Menambahkan margin kiri -->
                <p class="text-lg">
                    <span class="text-[#E66445]">Beranda</span> /
                    <span class="text-white">Mitra</span>
                </p>
                <h1 class="text-7xl font-bold">Mitra</h1>
                <p class="mt-2 text-sm">Mitra CSR Kabupaten Cirebon</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-10 h-1 bg-[#FF5D56] mx-auto "></div>
    <div class="container mx-auto my-8">
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-4">
                <select class="form-select bg-white border-gray-300 rounded-md">
                    <option>Laporan Terbanyak</option>
                </select>
            </div>
            <input type="text" placeholder="Cari Proyek" class="border-gray-300 p-2 rounded-lg w-full" wire:model.live="search" />
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-6">
            @foreach($mitras as $mitra)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <!-- Make image clickable by wrapping it in a link -->
                <a href="{{ route('mitra.show', $mitra->id) }}">
                    <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama_pt }}" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <!-- Make title clickable by wrapping it in a link -->
                    <a href="{{ route('mitra.show', $mitra->id) }}">
                        <h5 class="mt-3 text-xl font-bold">{{ $mitra->nama }}</h5>
                    </a>
                   
                </div>
            </div>
            @endforeach
        </div>
        
    </div>

    <!-- Hubungi Kami Section -->




</div>
