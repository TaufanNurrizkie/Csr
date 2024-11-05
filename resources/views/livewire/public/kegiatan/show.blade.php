<div class="bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <header class="relative" style="width: 1440px; height: 450px; overflow: hidden;">
        <svg width="550" height="450" viewBox="0 0 602 450" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0">
            <rect width="602" height="450" fill="#510300"/>
        </svg>

        <!-- Image overlay -->
        <div class="absolute inset-0" style="top: 50%; left: 53%; width: 100%; height: 70%; transform: translate(-50%, -50%);">
            <img src="{{ asset('backgroundPublic.png') }}" alt="Overlay Image" class="w-full h-full object-cover">
            <!-- Dimmed overlay -->
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        
        <div class="absolute inset-0 flex items-center justify-start pl-20" style="top: 50%; transform: translateY(-50%);">
            <div class="relative z-10 text-white text-left flex flex-col ml-20">
                <p class="text-lg">
                    <a href="/" class="text-[#E66445]">Beranda</a> /
                    <a href="{{ route('kegiatan.index') }}" wire:navigate class="text-[#E66445]">Kegiatan</a>    /
                    <a class="text-white">Detail</a>
                </p>
        
                @if($kegiatan->isNotEmpty())
                    <h1 class="text-7xl font-bold">{{ $kegiatan->first()->title }}</h1>
                    <p class="mt-2 text-sm">{{ \Carbon\Carbon::parse($kegiatan->first()->published_date)->format('d M, Y') }}</p>
                @else
                    <h1 class="text-7xl font-bold">No Kegiatan Available</h1>
                    <p class="mt-2 text-sm">N/A</p>
                @endif
        
                
            </div>
        </div>
        
    </header>
    
    <!-- Main Content -->
    <main class="container mx-auto p-8 bg-white shadow-lg rounded-3xl mt-6 md:mt-8">
        @if($kegiatan->isNotEmpty())
            <img src="{{ asset('storage/' . $kegiatan->first()->photo) }}" alt="{{ $kegiatan->first()->title }}" 
                 class="block mx-auto object-cover rounded-lg shadow-md mb-6" 
                 style="width: 500px; height: 500px;">
        
            <section class="mt-4">
                <p class="text-gray-800 leading-relaxed mb-4">{{ $kegiatan->first()->description }}</p>
            </section>
        @else
            <p class="text-gray-800 leading-relaxed mb-4">No details available.</p>
        @endif
    </main>
    
    <!-- Konten Lainnya Section -->
    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-bold mb-4 text-center">Konten Lainnya</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kegiatan as $item)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">{{ \Carbon\Carbon::parse($item->published_date)->format('d M, Y') }}</span>
                    <h5 class="mt-3 text-xl font-bold">{{ $item->title }}</h5>
                    <p class="mt-2 text-gray-600">{{ Str::limit($item->description, 100) }}</p>
                    <a href="{{ route('kegiatan.show', $item->id) }}" class="inline-block mt-4 text-blue-500 font-semibold hover:underline">Lihat Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</div>
