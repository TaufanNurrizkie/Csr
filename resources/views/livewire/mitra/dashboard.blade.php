<div class="bg-gray-100">
    <!-- Header Section -->
    <div class="flex items-center" style="background-image: url('{{ asset('background.png') }}'); background-size: cover; background-position: center; min-height: 250px;">
      <div class="container mx-auto flex flex-col items-center justify-center h-full text-center p-6 rounded">
        <h1 class="text-4xl font-bold text-white my-5">Selamat Datang di Dashboard CSR Kabupaten Cirebon</h1>
        <p class="text-lg text-white">Lapor dan ketahui program CSR Anda</p>
      </div>
    </div>




    <!-- Filter Section -->
    <div class="container mx-auto mt-8">
        <div class="flex justify-center items-center space-x-4">

          <!-- Input Tahun -->
          <div class="w-1/4">
            <select
              class="border border-gray-300 text-sm rounded-lg block w-full p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
              <option value="" disabled selected>2024</option>
              <option value="2023">2023</option>
              <option value="2022">2022</option>
              <!-- Tambahkan pilihan tahun lain jika diperlukan -->
            </select>
          </div>

          <!-- Input Kuartal -->
          <div class="w-1/3">
            <select
              class="border border-gray-300 text-sm rounded-lg block w-full p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
              <option value="" disabled selected>Kuartal 2 (April, Mei, Juni)</option>
              <option value="Q1">Kuartal 1 (Jan, Feb, Mar)</option>
              <option value="Q3">Kuartal 3 (Jul, Agu, Sep)</option>
              <option value="Q4">Kuartal 4 (Okt, Nov, Des)</option>
            </select>
          </div>

          <!-- Filter Button -->
          <div>
            <button class="bg-[#98100A] text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors text-sm">
              Terapkan filter
            </button>
          </div>

          <!-- Download CSV -->
          <div>
            <a href="{{ route('dashboard.downloadcsv') }}"
              class="border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-600 hover:text-white transition-colors text-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              Unduh .csv
            </a>
          </div>

          <!-- Download PDF -->
          <div>
            <a href="{{ route('dashboard.downloadpdf') }}"
              class="border border-red-600 text-red-600 py-2 px-4 rounded-lg hover:bg-red-600 hover:text-white transition-colors text-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              Unduh .pdf
            </a>
          </div>
        </div>
      </div>


    <!-- Main Section -->
    <div class="container mx-auto mt-4">
      <div class=" p-4 rounded-lg ">
        <h2 class="text-3xl font-bold my-4 text-start">Data Statistik</h2>
        <!-- Data Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4 text-center">
            <!-- Kartu Total Proyek CSR -->
            <div class="bg-[#F95016] text-white p-5 rounded-lg shadow-md">
                <div class="flex items-center text-base justify-start">
                  <img src="{{ asset('total.png') }}" alt="Total CSR" class="w-10 h-10 object-contain"> <!-- Menyesuaikan ukuran gambar -->
                  <span class="mr-2"></span>
                  Total Proyek CSR
                </div>
                <div class="text-3xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-3 inline-block rounded-md">
                  {{ $jumlahCSR }}
                </div>
              </div>


            <!-- Kartu Proyek Terealisasi -->
            <div class="bg-[#7A5AF8] text-white p-5 rounded-lg shadow-md">
              <div class="flex items-center text-base justify-start">
                <img src="{{ asset('proyek.png') }}" alt="Total CSR" class="w-10 h-10 object-contain"> <!-- Menyesuaikan ukuran gambar -->
                <span class="mr-2">
                </span>
                Proyek Terealisasi
              </div>
              <div class="text-3xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-3 inline-block rounded-md">
                {{ $jumlahApproved }}
              </div>
            </div>

            <!-- Kartu Total Dana CSR -->
            <div class="bg-[#1D9C53] text-white p-5 rounded-lg shadow-md">
              <div class="flex items-center text-base justify-start">
                <img src="{{ asset('dana.png') }}" alt="Total CSR" class="w-10 h-10 object-contain"> <!-- Menyesuaikan ukuran gambar -->
                <span class="mr-2">

                </span>
                Total Dana CSR
              </div>
              <div class="text-3xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-3 inline-block rounded-md">
                {{ 'Rp. ' . number_format($totalDanaCsr, 0, ',', '.') }}
              </div>
            </div>

          </div>
      </div>
      <h2 class="text-3xl font-bold ml-3 mb-8 text-start mt-8">Realisasi Proyek CSR</h2>
    </div>
    <!-- Realisasi Proyek CSR -->
    <div class="p-6 rounded-lg shadow-md">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
    <!-- Charts Section -->
    @foreach ([$pieChart, $barChart, $barChart2] as $index => $chart)
    <div class="{{ $index === 2 ? 'col-span-2' : 'bg-white p-5 rounded-lg shadow-lg' }}">
      <div class="w-full h-full flex items-center justify-center bg-white">
        <div class="w-full h-full">
          {!! $chart->container() !!}
        </div>
      </div>
    </div>
    @endforeach
  </div>


  <div class="container mx-auto p-4 mt-10">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-extrabold text-gray-800">Laporan Mitra</h1>
        <a href="/mitra/laporan/create" wire:navigate class="bg-[#98100A] text-white px-4 py-2 rounded hover:bg-red-700">+ Buat Laporan Baru</a>
    </div>

    <!-- Search bar -->
    <div class="mb-4">
        <input type="text" placeholder="Cari" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Table -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-white">
                <tr class="text-gray-600"> <!-- Teks header abu-abu -->
                    <th class="text-left px-6 py-3 border-b border-gray-300">JUDUL</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">LOKASI</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">REALISASI</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">TGL REALISASI</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">LAPORAN DIKIRIM</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">STATUS</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    <tr class="bg-white hover:bg-gray-100"> <!-- Baris ganjil (putih) -->
                        <td class="px-6 py-4 border-b border-gray-300">{{ $report->title }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $report->lokasi }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">Rp.{{ number_format($report->realisasi, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ \Carbon\Carbon::parse($report->tgl_realisasi)->format('d M Y') }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ \Carbon\Carbon::parse($report->tgl_dikirim)->format('d M Y') }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                            {{ $report->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                               ($report->status === 'approved' ? 'bg-green-100 text-green-800' :
                               ($report->status === 'revisi' ? 'bg-yellow-100 text-yellow-600' :
                               'bg-red-100 text-red-800')) }}">
                            {{ ucfirst($report->status) }}
                        </span>
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 text-center">
                            <a href="{{ route('mitra.laporan.show', ['id' => $report->id]) }}" wire:navigate>
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Load More Button -->
    <div class="flex justify-center mt-4">
        <a href="/mitra/laporan" wire:navigate class="flex items-center text-red-600 hover:text-red-800">
            <img src="{{ asset('loading.png') }}" alt="" class="w-4 h-4 mr-2">
            Muat Lebih Banyak
        </a>
    </div>
</div>


</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{ $pieChart->script() }}
{{ $barChart->script() }}
{{ $barChart2->script() }}

