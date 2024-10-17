<div>
    <!-- Hero Section -->
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
                    <span class="text-white">Statistik</span>
                </p>
                <h1 class="text-7xl font-bold">Sektor</h1>
                <p class="mt-2 text-sm">Program CSR Yang Sudah Berjalan Di Kabupaten Cirebon</p>
            </div>
        </div>
    </div>

    <div class="relative bg-white py-10 px-8">
        <div class="flex flex-col items-center py-4">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div> <!-- Garis merah di atas -->
            <h2 class="text-3xl font-extrabold text-center mb-4">Sektor CSR</h2>
            <p class="text-gray-600 mb-7">Bidang Program CSR Kabupaten Cirebon yang tersedia</p>
        </div>

        {{-- Sektor --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($sektor as $item)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
                <div class="p-4">
                  <h3 class="text-lg font-semibold mb-2">{{ $item->nama }}</h3>
                  <p class="bg-[#F4F4F4] text-gray-500 text-base px-2 py-1 rounded-md inline-block">
                      Tersedia: {{ $item->projects_count }}
                    </p>
                    <a href="{{ route('sektor.details', $item->id) }}" wire:navigate class="mt-4 bg-[#98100A] text-white px-4 py-2 rounded-xl hover:bg-red-700 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg block w-full text-center">
                        Lihat detail
                    </a>
                </div>
              </div>
            @empty
            <p class="text-center text-gray-500">Belum ada Sektor yang tersedia.</p>
            @endforelse

          </div>

          <img src="{{ asset('decor3.png') }}" alt="" class="absolute bottom right-6 w-32 h-32 mt-[-20px] mr-[-20px]">


          <div class="bg-white py-10 px-3 mt-16">
            <div class="flex flex-col flex-start py-4">
                <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div>
                <h2 class="text-3xl font-extrabold mb-4">Proyek Tersedia</h2>
            </div>

            <div class="grid grid-cols-4 gap-6 mb-10">
                <!-- Input Tahun -->
                <div class="col-span-1">
                    <div class="relative">
            <!-- Input Tahun dengan jQuery UI Datepicker -->
            <select  id="sector" wire:model="sector" class="border border-gray-300 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
                <option value="Semua Sektor">Semua Sektor</option>
                @foreach($sektors as $sektor)
                    <option value="{{ $sektor->id }}">{{ $sektor->nama }}</option>
                @endforeach
            </select>
                    </div>
                </div>

                <!-- Input Kuartal dengan select -->
                <div class="col-span-2">
                    <div class="relative">
                            <input type="text" placeholder="Cari Proyek" class="border-gray-300 p-2 rounded-lg w-full" wire:model.live="search" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($projects as $project)
                <a href="{{ route('project.details', $project->id) }}" wire:navigate class="block bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    {{-- Ambil gambar pertama dari array path --}}
                    @php
                        $photoArray = json_decode($project->photo, true);
                        $firstPhoto = is_array($photoArray) ? $photoArray[0] : $project->photo;
                    @endphp

                    <img src="{{ asset('storage/' . $firstPhoto) }}" alt="{{ $project->judul }}" class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $project->judul }}</h3>
                        <p class="bg-[#F4F4F4] text-gray-500 text-base px-2 py-2 mb-3">
                            <img src="{{ asset('lokasi.png') }}" class="inline-block w-5 h-5"> {{ $project->lokasi }}
                        </p>
                        <p class="bg-[#F4F4F4] text-gray-500 text-base px-2 py-2 mb-3">
                            {{ $project->sektor->nama }}
                        </p>
                        <p class="bg-[#F4F4F4] text-gray-500 text-base px-2 py-2">
                            Tgl. Berakhir: {{ \Carbon\Carbon::parse($project->end_date)->format('M d, Y') }}
                        </p>
                    </div>
                </div>
                </a>
            @endforeach
              </div>

               <!-- Tombol Muat Lebih Banyak -->
               @if($projects->count() >= 8)
               <div class="flex justify-center mt-8">
                   <button wire:click="loadMore" class="border text-black px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:bg-black hover:text-white hover:shadow-lg hover:-translate-y-1">
                       Muat lebih banyak
                   </button>
               </div>
           @endif
</div>
