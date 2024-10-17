<div>
    <!-- Hero Section -->
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
                    <span class="text-[#E66445]">Beranda</span> /
                    <span class="text-white">Laporan</span>
                </p>
                <h1 class="text-7xl font-bold">Laporan</h1>
                <p class="mt-2 text-sm">Kegiatan Terkini Dari CSR Kabupaten Cirebon</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-6 mb-10 ml-28 mt-10">
        <!-- Input Tahun -->
        <div class="col-span-1">
            <div class="relative">
                <!-- Input Tahun dengan jQuery UI Datepicker -->
                <select
                    class="border border-gray-300 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
                    <option value="" disabled selected>Terbaru</option>
                    <option value="Q1">Kuartal 1 (Jan, Feb, Mar)</option>
                    <option value="Q2">Kuartal 2 (Apr, Mei, Jun)</option>
                    <option value="Q3">Kuartal 3 (Jul, Agu, Sep)</option>
                    <option value="Q4">Kuartal 4 (Okt, Nov, Des)</option>
                </select>
            </div>
        </div>

        <!-- Input Kuartal dengan select -->
        <div class="col-span-1">
            <div class="relative">
                <select
                    class="border border-gray-300 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
                    <option value="" disabled selected>Semua Mitra</option>
                    <option value="Q1">Kuartal 1 (Jan, Feb, Mar)</option>
                    <option value="Q2">Kuartal 2 (Apr, Mei, Jun)</option>
                    <option value="Q3">Kuartal 3 (Jul, Agu, Sep)</option>
                    <option value="Q4">Kuartal 4 (Okt, Nov, Des)</option>
                </select>
            </div>
        </div>

        <div class="col-span-2 mr-20">
            <div class="relative">
                <input type="text" placeholder="Cari Proyek" class="border-gray-300 p-2 rounded-lg w-full"
                    wire:model.live="search" />
            </div>
        </div>
    </div>

    <div class="container mx-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 ml-20">
        @foreach ($laporans as $laporan)
            <a href="{{ route('laporan.detail', $laporan->id) }}" class="block">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden relative">
                    <img src="{{ $laporan->foto ?? 'https://via.placeholder.com/600x400' }}" alt="Laporan Image"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-3 left-2 bg-red-600 text-white px-3 py-1 text-xs rounded">
                        {{ $laporan->created_at ? $laporan->created_at->format('d M, Y') : 'Tanggal tidak tersedia' }}
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <img class="w-8 h-8 rounded-full mr-2" src="https://via.placeholder.com/40" alt="Avatar">
                            <span class="font-semibold text-gray-700">{{ $laporan->reviewed_by }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $laporan->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($laporan->deskripsi, 100) }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <!-- Card End -->
    @if ($laporans->count() >= 8)
        <div class="flex justify-center mt-8">
            <a href="/semualaporan" class="border text-black px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:bg-black hover:text-white hover:shadow-lg hover:-translate-y-1">Muat Lebih Banyak</a>
        </div>
    @endif


</div>
