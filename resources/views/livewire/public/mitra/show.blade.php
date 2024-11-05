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
                    <a href="/" class="text-[#E66445]">Beranda</a> /
                    <a href="/mitras" class="text-[#E66445]">Mitra</a> /
                    <a class="text-white">Detail</a>
                </p>
                <h1 class="text-7xl font-bold">{{ $mitra->nama }}</h1>
                <p class="mt-2 text-sm">{{ $mitra->nama_pt }} . {{ $mitra->email }} . {{ $mitra->no_telp }}</p>
                <p class="mt-2 text-sm">{{ $mitra->alamat }}</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto p-8 bg-white shadow-lg rounded-3xl mt-6 md:mt-8 flex flex-col items-center">
        <div class="flex flex-col items-start mb-6">
            <div class="w-10 h-1 bg-[#FF5D56] "></div>
            <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama_pt }}" 
                 class="object-cover  shadow-md" 
                 style="width: 720px; height: 416px;">
        </div>
    
        <!-- Mitra Description -->
        <section class="mt-4 text-center max-w-[720px]">
            <p class="text-[#475467] leading-relaxed mb-4">{{ $mitra->deskripsi }}</p>
        </section>
    </main>
    
    
    

    <!-- Other Mitra Content Section -->
    <div class="container ml-[50px] mt-20">
        <div class="w-10 h-1 bg-[#FF5D56] mb-4"></div>
        <h2 class="text-4xl font-bold mb-8">Laporan Dari Mitra</h2>
    </div>
    
    <div class="container mx-auto my-4 text-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-1 gap-y-4 justify-center"> <!-- Menggunakan gap-x-1 untuk jarak horizontal yang lebih kecil dan gap-y-4 untuk jarak vertikal -->
            @foreach ($reports as $report)
            <a href="{{ route('laporan.detail', $report->id) }}" class="bg-white rounded-lg shadow-lg overflow-hidden relative">
                <img src="{{'../storage/' . $report->foto ?? 'https://via.placeholder.com/600x400' }}" alt="report Image"                    class="w-full h-48 object-cover">
                <div class="absolute top-3 left-2 bg-red-600 text-white px-3 py-1 text-xs rounded">
                  {{ \Carbon\Carbon::parse($report->tgl_realisasi)->format('d F, Y') }}
  
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800">{{ $report->title }}</h3>
                    <p class="text-gray-600 text-sm mt-2 text-justify">{{ $report->deskripsi }}</p>
                </div>
                
            </a>
                @endforeach
            </div>
            <a href="/laporan" class="inline-block mt-[30px] text-[#344054] font-semibold hover:underline">Lihat Semua Laporan</a>
    </div>
    
    
    
    

    <!-- Hubungi Kami Section -->

</div>
