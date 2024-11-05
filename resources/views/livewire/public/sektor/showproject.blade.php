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
                    <a href="/" class="text-[#E66445]">Beranda</a> /
                    <a href="/sektorj" class="text-[#E66445]">Sektor</a> / <span class="text-white">{{ $project->judul }}</span>
                </p>
                <h1 class="text-7xl font-bold">{{ $project->judul }}</h1>
                <p class="mt-4 text-sm">Mulai: {{ \Carbon\Carbon::parse($project->tanggal_dibuat)->format('d F Y') }} -  Akhir: {{ \Carbon\Carbon::parse($project->tanggal_berakhir)->format('d F Y') }}</p>
                <p class="mt-2 text-sm text-gray-200">UPTD Pusat Pelayanan Sosial Griya Wanita Mandiri, Kab Cirebon</p>
            </div>
        </div>
    </div>

    <div class="bg-white py-5 px-3 mt-10">
        <div class="flex flex-col flex-start py-">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2 ml-4"></div>
            <div class="text-gray-700 text-base leading-relaxed ml-4"> <!-- Menambahkan margin kiri -->
                <h1 class="text-4xl font-extrabold">Deskripsi Proyek</h1>
                {{ $project->deskripsi }}
            </div>
        </div>
    </div>

    <div class="container mx-auto py-10 mt-16">
        <h2 class="text-3xl font-bold mb-5 text-left">Galeri</h2>
        <div class="grid grid-cols-{{ $project->photo ? (count(json_decode($project->photo)) > 1 ? '2' : '1') : '1' }} md:grid-cols-{{ $project->photo ? (count(json_decode($project->photo)) >= 4 ? '4' : count(json_decode($project->photo))) : '1' }} gap-4 mb-6">
            @if ($project->photo)
                @foreach (json_decode($project->photo) as $photo)
                    <img src="{{ asset('storage/' . $photo) }}" alt="Project Photo" class="rounded-lg shadow-md w-full h-32 object-cover">
                @endforeach
            @else
                <p class="text-gray-500">Tidak ada foto tersedia.</p>
            @endif
        </div>
    </div>

    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-10 mt-7">Mitra yang berpartisipasi</h1>

        <!-- Tabel Mitra -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">
                        <th class="py-3 px-6">Nama Mitra</th>
                        <th class="py-3 px-6">Lokasi</th>
                        <th class="py-3 px-6">No. Telepon</th>
                        <th class="py-3 px-6">Tgl Pengajuan</th>
                        <th class="py-3 px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    <!-- Baris Pertama -->
                    <tr class="border-t">
                        <td class="py-4 px-6">GITS Indonesia</td>
                        <td class="py-4 px-6 text-blue-500"><a href="mailto:info@gits.id">info@gits.id</a></td>
                        <td class="py-4 px-6">022 677 ####</td>
                        <td class="py-4 px-6">1 Juli 2024</td>
                        <td class="py-4 px-6">
                            <button class="bg-red-600 text-white px-4 py-2 rounded-md flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0l-3-3m3 3l3 3" />
                                </svg>
                                Lihat laporan
                            </button>
                        </td>
                    </tr>
                    <!-- Baris Kedua -->
                    <tr class="border-t">
                        <td class="py-4 px-6">Eudeka!</td>
                        <td class="py-4 px-6 text-blue-500"><a href="mailto:info@eudeka@gits.id">info@eudeka@gits.id</a></td>
                        <td class="py-4 px-6">022 667 ####</td>
                        <td class="py-4 px-6">1 Juli 2024</td>
                        <td class="py-4 px-6">
                            <button class="bg-red-600 text-white px-4 py-2 rounded-md flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0l-3-3m3 3l3 3" />
                                </svg>
                                Lihat laporan
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
