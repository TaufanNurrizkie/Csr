<div class="bg-gray-100">
    <!-- Header Section -->
    <div class="flex items-center" style="background-image: url('{{ asset('background.png') }}'); background-size: cover; background-position: center; min-height: 250px;">
      <div class="container mx-auto flex flex-col items-center justify-center h-full text-center p-6 rounded">
        <h1 class="text-4xl font-bold text-white my-5">Selamat Datang di Dashboard CSR Kabupaten Cirebon</h1>
        <p class="text-lg text-white">Lapor dan ketahui program CSR Anda</p>
      </div>
    </div>
  
    <!-- Filter Section -->
    <div class="container mx-auto mt-8 flex justify-center">
      <div class="flex items-center space-x-7">
        @foreach (['Tahun' => ['2024', '2023', '2022'], 'Kuartal' => ['Kuartal 2 (April, Mei, Juni)', 'Kuartal 1 (Januari, Februari, Maret)', 'Kuartal 3 (Juli, Agustus, September)', 'Kuartal 4 (Oktober, November, Desember)'], 'Sektor' => ['Semua Sektor', 'Sektor 1', 'Sektor 2'], 'Mitra' => ['Semua Mitra', 'Mitra 1', 'Mitra 2']] as $label => $options)
        <div>
          <select class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
            @foreach ($options as $option)
            <option {{ $loop->first ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
          </select>
        </div>
        @endforeach
  
        <!-- Filter and Download Buttons -->
        <div>
          <button class="bg-red-600 text-white py-1.5 px-3 rounded hover:bg-red-700 transition-colors">Terapkan filter</button>
        </div>
        @foreach (['csv' => 'green', 'pdf' => 'red'] as $type => $color)
        <div>
          <button class="border border-{{ $color }}-600 text-{{ $color }}-600 py-1.5 px-3 rounded hover:bg-{{ $color }}-600 hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Unduh .{{ $type }}
          </button>
        </div>
        @endforeach
      </div>
    </div>
  
    <!-- Main Section -->
    <div class="container mx-auto mt-6">
      <div class="bg-white p-4 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold my-8 text-start">Data Statistik</h2>
        <!-- Data Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-4 text-center">
          <div class="bg-[#F95016] text-white p-3 rounded-lg">
            <div class="flex items-center text-base justify-start">
              <!-- Tempat Icon -->
              <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-1.14 1.93-1.14 2.23 0l1.518 5.759a1 1 0 00.95.69h6.039c1.184 0 1.668 1.52.762 2.236l-4.876 3.93a1 1 0 00-.36 1.118l1.518 5.758c.3 1.14-.955 2.078-1.92 1.388l-4.875-3.928a1 1 0 00-1.178 0l-4.875 3.928c-.964.69-2.22-.248-1.92-1.388l1.518-5.758a1 1 0 00-.36-1.118l-4.876-3.93C1.327 10.896 1.81 9.375 2.994 9.375h6.038a1 1 0 00.95-.69l1.518-5.758z"/>
                </svg>
              </span>
              Pengajuan CSR
            </div>
            <div class="text-xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-2 inline-block rounded-md">
              12000
            </div>
          </div>
    
          <div class="bg-[#7A5AF8] text-white p-3 rounded-lg">
            <div class="flex items-center text-base justify-start">
              <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-1.14 1.93-1.14 2.23 0l1.518 5.759a1 1 0 00.95.69h6.039c1.184 0 1.668 1.52.762 2.236l-4.876 3.93a1 1 0 00-.36 1.118l1.518 5.758c.3 1.14-.955 2.078-1.92 1.388l-4.875-3.928a1 1 0 00-1.178 0l-4.875 3.928c-.964.69-2.22-.248-1.92-1.388l1.518-5.758a1 1 0 00-.36-1.118l-4.876-3.93C1.327 10.896 1.81 9.375 2.994 9.375h6.038a1 1 0 00.95-.69l1.518-5.758z"/>
                </svg>
              </span>
              Jumlah CSR Disetujui
            </div>
            <div class="text-xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-2 inline-block rounded-md">
              5000
            </div>
          </div>
    
          <div class="bg-[#00D084] text-white p-3 rounded-lg">
            <div class="flex items-center text-base justify-start">
              <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-1.14 1.93-1.14 2.23 0l1.518 5.759a1 1 0 00.95.69h6.039c1.184 0 1.668 1.52.762 2.236l-4.876 3.93a1 1 0 00-.36 1.118l1.518 5.758c.3 1.14-.955 2.078-1.92 1.388l-4.875-3.928a1 1 0 00-1.178 0l-4.875 3.928c-.964.69-2.22-.248-1.92-1.388l1.518-5.758a1 1 0 00-.36-1.118l-4.876-3.93C1.327 10.896 1.81 9.375 2.994 9.375h6.038a1 1 0 00.95-.69l1.518-5.758z"/>
                </svg>
              </span>
              Sektor CSR
            </div>
            <div class="text-xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-2 inline-block rounded-md">
              200
            </div>
          </div>
    
          <div class="bg-[#FFCE00] text-white p-3 rounded-lg">
            <div class="flex items-center text-base justify-start">
              <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-1.14 1.93-1.14 2.23 0l1.518 5.759a1 1 0 00.95.69h6.039c1.184 0 1.668 1.52.762 2.236l-4.876 3.93a1 1 0 00-.36 1.118l1.518 5.758c.3 1.14-.955 2.078-1.92 1.388l-4.875-3.928a1 1 0 00-1.178 0l-4.875 3.928c-.964.69-2.22-.248-1.92-1.388l1.518-5.758a1 1 0 00-.36-1.118l-4.876-3.93C1.327 10.896 1.81 9.375 2.994 9.375h6.038a1 1 0 00.95-.69l1.518-5.758z"/>
                </svg>
              </span>
              Total Dana CSR
            </div>
            <div class="text-xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-2 inline-block rounded-md">
              7.000.000.000
            </div>
          </div>
        </div>
    
    
      </div>
    </div>
  
    <!-- Realisasi Proyek CSR -->
    <h2 class="text-3xl font-bold ml-8 mb-8 text-start">Realisasi Proyek CSR</h2>
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
  
