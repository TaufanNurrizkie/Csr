<div>
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
                    <span class="text-[#E66445]">Statistik</span> / <span class="text-white">{{ $sektor->nama }}</span>
                </p>
                <h1 class="text-7xl font-bold">{{ $sektor->nama }}</h1>
                <p class="mt-2 text-sm">Program CSR Yang Sudah Berjalan Di Kabupaten Cirebon</p>
            </div>
        </div>
    </div>

    <img src="{{ asset('dekor2.png') }}" alt="" class="absolute top- right-6 w-40 h-40 mt-[-20px] mr-[-20px]"> <!-- Adjust mt and mr as needed -->

    <div class="bg-white py-5 px-3 mt-10">
        <div class="flex flex-col flex-start py-">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2 ml-20"></div>
            <div class="text-gray-700 text-base leading-relaxed ml-20"> <!-- Menambahkan margin kiri -->
                {{ $sektor->deskripsi }}
            </div>
        </div>
    </div>

    <div class="bg-white py-10 px-3 mt-28">
        <div class="flex flex-col flex-start py-4">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2 ml-20"></div>
            <h1 class="text-3xl font-extrabold mb-4 ml-20">Proyek CSR</h1>
            <p class="text-sm text-gray-600 ml-20">Proyek CSR Kabupaten Cirebon yang tersedia</p>
        </div>

        <div class="container mx-auto mt-10 ml:md-20">
            <div class="flex flex-col">
                @foreach($projects as $project)
                <div class="flex justify-between items-center bg-white py-4 px-5 border-b border-gray-200">
                        <h3 class="text-gray-800 text-lg font-semibold">{{ $project->judul }}</h3>
                        <p class="text-gray-600">{{ $project->lokasi }}</p>
                        <a href="{{ route('project.details', $project->id) }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                            Lihat Detail Proyek
                        </a>
                </div>
                @endforeach
            </div>
        </div>

</div>
