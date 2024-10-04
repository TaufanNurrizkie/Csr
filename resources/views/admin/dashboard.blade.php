@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard CSR Kabupaten Cirebon</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="bg-[url('{{ asset('background.png') }}')] h-56 bg-cover bg-center flex items-center justify-center">
    <div class="text-center">
      <h1 class="text-4xl font-bold text-white mb-3">Selamat Datang di Dashboard CSR Kabupaten Cirebon</h1>
      <p class="text-white">Lapor dan ketahui program CSR Anda</p>
    </div>
  </div>

  <!-- Filter Section -->
  <div class="container mx-auto mt-8 flex justify-center">
    <div class="flex items-center space-x-7">
      <!-- Dropdown Tahun -->
      <div>
        <select class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
          <option selected>2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
        </select>
      </div>

      <!-- Dropdown Kuartal -->
      <div>
        <select class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
          <option selected>Kuartal 2 (April, Mei, Juni)</option>
          <option value="1">Kuartal 1 (Januari, Februari, Maret)</option>
          <option value="3">Kuartal 3 (Juli, Agustus, September)</option>
          <option value="4">Kuartal 4 (Oktober, November, Desember)</option>
        </select>
      </div>

      <!-- Dropdown Semua Sektor -->
      <div>
        <select class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
          <option selected>Semua Sektor</option>
          <option value="1">Sektor 1</option>
          <option value="2">Sektor 2</option>
        </select>
      </div>

      <!-- Dropdown Semua Mitra -->
      <div>
        <select class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
          <option selected>Semua Mitra</option>
          <option value="1">Mitra 1</option>
          <option value="2">Mitra 2</option>
        </select>
      </div>

      <!-- Tombol Terapkan Filter -->
      <div>
        <button class="bg-red-600 text-white py-1.5 px-3 rounded hover:bg-red-700 transition-colors">
          Terapkan filter
        </button>
      </div>

      <!-- Tombol Unduh CSV -->
      <div>
        <button class="border border-green-600 text-green-600 py-1.5 px-3 rounded hover:bg-green-600 hover:text-white transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Unduh .csv
        </button>
      </div>

      <!-- Tombol Unduh PDF -->
      <div>
        <button class="border border-red-600 text-red-600 py-1.5 px-3 rounded hover:bg-red-600 hover:text-white transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Unduh .pdf
        </button>
      </div>
    </div>
  </div>

  <!-- Main Section -->
  <div class="container mx-auto mt-6">
    <div class="bg-white p-4 rounded-lg shadow-md">
      <h2 class="text-3xl font-bold my-8 text-start">Realisasi Proyek CSR</h2>
      <!-- Data Statistik -->
      <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-4 text-center">
        <div class="bg-red-500 text-white p-3 rounded-lg">
          <div class="text-base">Pengajuan CSR</div>
          <div class="text-xl font-bold">12000</div>
        </div>
        <div class="bg-blue-500 text-white p-3 rounded-lg">
          <div class="text-base">Proyek Terealisasi</div>
          <div class="text-xl font-bold">11000</div>
        </div>
        <div class="bg-yellow-500 text-white p-3 rounded-lg">
          <div class="text-base">Mitra Berpartisipasi</div>
          <div class="text-xl font-bold">1800</div>
        </div>
        <div class="bg-green-500 text-white p-3 rounded-lg">
          <div class="text-base">Nominal Terealisasi</div>
          <div class="text-xl font-bold">Rp 100.000.000</div>
        </div>
      </div>

      <!-- Realisasi Proyek CSR -->
      <div class="bg-gray-50 p-4 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold mb-3 text-start">Realisasi Proyek CSR</h2>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Pie Chart -->
          <div class="bg-white p-3 rounded-lg shadow-md">
            <h3 class="text-xl mb-2 text-start font-bold">Persentase total realisasi berdasarkan sektor CSR</h3>
            <div class="w-full h-100 bg-white-200 rounded-lg">
              <div class="w-full h-full flex items-center justify-center">
                <div class="max-w-xl max-h-xl w-full h-full">
                  {!! $pieChart->container() !!}
                </div>
              </div>
            </div> <!-- Tempat untuk chart -->
          </div>

          <!-- Bar Chart -->
          <div class="bg-white p-3 rounded-lg shadow-md">
            <h3 class="text-xl mb-2 text-start font-bold">Persentase total realisasi berdasarkan sektor CSR</h3>
            <div class="w-full h-100 bg-white-200 rounded-lg">
              <div class="w-full h-full flex items-center justify-center">
                <div class="max-w-xl max-h-xl w-full h-full">
                  {!! $barChart->container() !!}
                </div>
              </div>
            </div> <!-- Tempat untuk chart -->
          </div>

          <!-- Realisasi Mitra -->
          <div class="bg-white p-3 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-2 text-center">Persentase total realisasi berdasarkan mitra</h3>
            <div class="w-full h-40 bg-white-200 rounded-lg"></div> <!-- Tempat untuk chart -->
          </div>

          <!-- Realisasi Kecamatan -->
          <div class="bg-white p-3 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-2 text-center">Persentase total realisasi berdasarkan Kecamatan</h3>
            <div class="w-full h-40 bg-white-200 rounded-lg"></div> <!-- Tempat untuk chart -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{ $pieChart->script() }}
{{ $barChart->script() }}

@endsection
