<div class="">
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
                    <a href="/" class="text-[#E66445]">Beranda</a> /
                    <a class="text-white">Kegiatan</a>
                </p>
                <h1 class="text-7xl font-bold">Kegiatan</h1>
                <p class="mt-2 text-sm">Kegiatan Terkini Dari CSR Kabupaten Cirebon</p>
            </div>
        </div>
    </div>
    
    
    

    <!-- Filter and Search -->
    <div class="filter-section my-8 container mx-auto">
        <div class="flex justify-between items-center space-x-4">
            <!-- Dropdown Sorting -->
            <div class="w-[240px]">
                <select wire:model="sortBy" class="form-select w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option value="desc">Terbaru</option>
                    <option value="asc">Terlama</option>
                </select>
            </div>
            <!-- Input Pencarian -->
            <div class="w-full ml-8">
                <input type="text" placeholder="Cari Proyek" class="border-gray-300 p-2 rounded-lg w-full" wire:model.live="search" />
            </div>
        </div>
    </div>
    
    <!-- Kegiatan Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 container mx-auto mt-4">
        @foreach($kegiatan as $item)
        <div class="bg-white overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <a href="{{ route('kegiatan.show', $item->id) }}" wire:navigate>
            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
            </a>
            <div class="p-4">
                <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">{{ \Carbon\Carbon::parse($item->published_date)->format('d M, Y') }}</span>
                <h5 class="mt-3 text-xl font-bold">{{ $item->title }}</h5>
                <p class="mt-2 text-gray-600">{{ Str::limit($item->description, 100) }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex justify-center mt-6">
        <a href="{{ route('semuakegiatan.index') }}" class="text-[#344054] font-semibold hover:underline">Muat lebih banyak</a>
    </div>
    
    


    


</div>
