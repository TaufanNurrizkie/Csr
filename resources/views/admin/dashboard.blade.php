@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard CSR Kabupaten Cirebon</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
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

      <!-- Dropdown Sektor -->
      <div>
        <select class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
          <option selected>Semua Sektor</option>
          <option value="1">Sektor 1</option>
          <option value="2">Sektor 2</option>
        </select>
      </div>

      <!-- Dropdown Mitra -->
      <div>
        <select class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
          <option selected>Semua Mitra</option>
          <option value="1">Mitra 1</option>
          <option value="2">Mitra 2</option>
        </select>
      </div>

      <!-- Tombol Terapkan Filter -->
      <div>
        <button class="bg-red-600 text-white py-1.5 px-3 rounded hover:bg-red-700 transition-colors">Terapkan filter</button>
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
        <div class="text-xl w-full mt-5 text-start  bg-white bg-opacity-20 text-white font-bold border-2 border-white p-2 inline-block rounded-md">
          12000
        </div>
      </div>

      <div class="bg-[#7A5AF8] text-white p-3 rounded-lg">
        <div class="flex items-center text-base justify-start">
          <!-- Tempat Icon -->
          <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-1.14 1.93-1.14 2.23 0l1.518 5.759a1 1 0 00.95.69h6.039c1.184 0 1.668 1.52.762 2.236l-4.876 3.93a1 1 0 00-.36 1.118l1.518 5.758c.3 1.14-.955 2.078-1.92 1.388l-4.875-3.928a1 1 0 00-1.178 0l-4.875 3.928c-.964.69-2.22-.248-1.92-1.388l1.518-5.758a1 1 0 00-.36-1.118l-4.876-3.93C1.327 10.896 1.81 9.375 2.994 9.375h6.038a1 1 0 00.95-.69l1.518-5.758z"/>
            </svg>
          </span>
          Proyek Terealisasi
        </div>
        <div class="text-xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-2 inline-block rounded-md">
          11000
        </div>
      </div>

      <div class="bg-[#2C5586] text-white p-3 rounded-lg">
        <div class="flex items-center text-base justify-start">
          <!-- Tempat Icon -->
          <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-1.14 1.93-1.14 2.23 0l1.518 5.759a1 1 0 00.95.69h6.039c1.184 0 1.668 1.52.762 2.236l-4.876 3.93a1 1 0 00-.36 1.118l1.518 5.758c.3 1.14-.955 2.078-1.92 1.388l-4.875-3.928a1 1 0 00-1.178 0l-4.875 3.928c-.964.69-2.22-.248-1.92-1.388l1.518-5.758a1 1 0 00-.36-1.118l-4.876-3.93C1.327 10.896 1.81 9.375 2.994 9.375h6.038a1 1 0 00.95-.69l1.518-5.758z"/>
            </svg>
          </span>
          Mitra Berpartisipasi
        </div>
        <div class="text-xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-2 inline-block rounded-md">
          1800
        </div>
      </div>

      <div class="bg-[#1D9C53] text-white p-3 rounded-lg">
        <div class="flex items-center text-base justify-start">
          <!-- Tempat Icon -->
          <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-1.14 1.93-1.14 2.23 0l1.518 5.759a1 1 0 00.95.69h6.039c1.184 0 1.668 1.52.762 2.236l-4.876 3.93a1 1 0 00-.36 1.118l1.518 5.758c.3 1.14-.955 2.078-1.92 1.388l-4.875-3.928a1 1 0 00-1.178 0l-4.875 3.928c-.964.69-2.22-.248-1.92-1.388l1.518-5.758a1 1 0 00-.36-1.118l-4.876-3.93C1.327 10.896 1.81 9.375 2.994 9.375h6.038a1 1 0 00.95-.69l1.518-5.758z"/>
            </svg>
          </span>
          Nominal Terealisasi
        </div>
        <div class="text-xl w-full mt-5 text-start bg-white bg-opacity-20 text-white font-bold border-2 border-white p-2 inline-block rounded-md">
          Rp 100.000.000
        </div>
      </div>
    </div>
  </div>
</div>




<!-- Realisasi Proyek CSR -->
<h2 class="text-3xl font-bold ml-8 mb-8 text-start">Realisasi Proyek CSR</h2>
<div class="bg-gray-50 p-6 rounded-lg shadow-md">

  <!-- Charts Section -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
    <!-- Pie Chart -->
    <div class="bg-white p-5 rounded-lg shadow-lg">

        <div class="w-full h-full flex items-center justify-center">
          <div class="w-10/12 h-full">
            {!! $pieChart->container() !!}
          </div>
        </div>
   
    </div>

    <!-- Bar Chart 1 -->
    <div class="bg-white p-5 rounded-lg shadow-lg">


        <div class="w-full h-full flex items-center justify-center">
          <div class="w-full h-full">
            {!! $barChart->container() !!}
          </div>
        </div>
    
    </div>

    <!-- Bar Chart 2 -->
    <div class="bg-white p-5 rounded-lg shadow-lg">

        <div class="w-full h-full flex items-center justify-center">
          <div class="w-full h-full">
            {!! $barChart2->container() !!}
          </div>
        </div>
     
    </div>

    <!-- Bar Chart 3 -->
    <div class="bg-white p-5 rounded-lg shadow-lg">

        <div class="w-full h-full flex items-center justify-center">
          <div class="w-full h-full">
            {!! $barChart3->container() !!}
          </div>
        </div>
      
    </div>
    
  </div>
</div>

  
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{ $pieChart->script() }}
{{ $barChart->script() }}
{{ $barChart2->script() }}
{{ $barChart3->script() }}

@endsection
