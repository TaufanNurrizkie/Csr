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
                <h1 class="text-7xl font-bold">Statistik</h1>
                <p class="mt-2 text-sm">Program CSR Yang Sudah Berjalan Di Kabupaten Cirebon</p>
            </div>
        </div>
    </div>
    <div class="relative bg-white py-10 px-8">
        <div class="flex flex-col items-center py-4">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div> <!-- Garis merah di atas -->
            <h2 class="text-3xl font-extrabold text-center mb-4">Data Statistik</h2>
        </div>

        <!-- Kotak-kotak image -->
        <img src="{{ asset('dekor2.png') }}" alt="" class="absolute top-0 right-6 w-40 h-40 mt-[-20px] mr-[-20px]"> <!-- Adjust mt and mr as needed -->

        <div class="grid grid-cols-4 gap-6 mb-10">
            <!-- Input Tahun -->
            <div class="col-span-1">
                <div class="relative">
        <!-- Input Tahun dengan jQuery UI Datepicker -->
                <input id="yearPicker" class="border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="Pilih Tahun">
                </div>
            </div>

            <!-- Input Kuartal dengan select -->
            <div class="col-span-2">
                <div class="relative">
                    <select class="border border-gray-300 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
                        <option value="" disabled selected>Pilih Kuartal</option>
                        <option value="Q1">Kuartal 1 (Jan, Feb, Mar)</option>
                        <option value="Q2">Kuartal 2 (Apr, Mei, Jun)</option>
                        <option value="Q3">Kuartal 3 (Jul, Agu, Sep)</option>
                        <option value="Q4">Kuartal 4 (Okt, Nov, Des)</option>
                    </select>
                </div>
            </div>

            <!-- Tombol di Paling Kanan -->
            <div class="flex items-end gap-2 col-span-1">
                <button class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <!-- Icon Download -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V3m0 9l-3-3m3 3l3-3" />
                    </svg>
                    Unduh .csv
                  </button>
                  <button class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <!-- Icon Download -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V3m0 9l-3-3m3 3l3-3" />
                    </svg>
                    Unduh .pdf
                  </button>
            </div>
        </div>

        <div class="container mx-auto px-6 mt-6"> <!-- Menambahkan margin atas pada container ini -->
            <div class="grid grid-cols-4 gap-4 text-left items-center">
                <!-- Kolom 1 -->
                <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
                    <div>
                        <h3 class="text-5xl font-bold text-[#510300] mb-2">  {{ $jumlahCSR }} </h3> <!-- Menambahkan margin bawah -->
                        <p class="text-lg font-medium text-gray-800">Total Proyek CSR</p>
                    </div>
                </div>
                <!-- Kolom 2 -->
                <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
                    <div>
                        <h3 class="text-5xl font-bold text-[#510300] mb-2">{{ $jumlahApproved }}</h3> <!-- Menambahkan margin bawah -->
                        <p class="text-lg font-medium text-gray-800">Proyek terealisasi</p>
                    </div>
                </div>
                <!-- Kolom 3 -->
                <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
                    <div>
                        <h3 class="text-5xl font-bold text-[#510300] mb-2">{{ $jumlahMitra }}</h3> <!-- Menambahkan margin bawah -->
                        <p class="text-lg font-medium text-gray-800">Mitra bergabung</p>
                    </div>
                </div>
                <!-- Kolom 4 -->
                <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
                    <div>
                        <h3 class="text-5xl font-bold text-[#510300] mb-2"> {{ 'Rp' . number_format($totalDanaCsr, 0, ',', '.') }}</h3> <!-- Menambahkan margin bawah -->
                        <p class="text-lg font-medium text-gray-800">Dana realisasi CSR</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-white py-10 px-8">
        <div class="flex flex-col flex-start py-4">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div>
            <h2 class="text-3xl font-extrabold mb-4">Realisasi <br> Proyek CSR</h2>
        </div>

  <!-- Realisasi Proyek CSR -->
 <!-- Realisasi Proyek CSR -->
 <div class="bg-gray-50 p-6 rounded-lg shadow-md">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
      <!-- Charts Section -->
      @foreach ([$pieChart, $barChart, $barChart2, $barChart3] as $chart)
      <div class="bg-white p-5 rounded-lg shadow-lg">
        <div class="w-full h-full flex items-center justify-center">
          <div class="w-full h-full">
            {!! $chart->container() !!}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  {{ $pieChart->script() }}
  {{ $barChart->script() }}
  {{ $barChart2->script() }}
  {{ $barChart3->script() }}
