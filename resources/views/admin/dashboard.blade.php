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

  <!-- Navbar -->

  <div class="bg-[url('{{ asset('background.png') }}')] h-64 bg-cover bg-center flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-5xl font-bold text-white mb-4">Selamat Datang di Dashboard CSR Kabupaten Cirebon</h1>
        <p class="text-white">lapor dan ketahui program CSR Anda</p>
    </div>
</div>


  
  <!-- Main Section -->
  <div class="container mx-auto mt-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
      

      <!-- Data Statistik -->
      <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 mb-8">
        <div class="bg-red-500 text-white p-4 rounded-lg">
          <div class="text-lg">Pengajuan CSR</div>
          <div class="text-2xl font-bold">12000</div>
        </div>
        <div class="bg-blue-500 text-white p-4 rounded-lg">
          <div class="text-lg">Proyek Terealisasi</div>
          <div class="text-2xl font-bold">11000</div>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded-lg">
          <div class="text-lg">Mitra Berpartisipasi</div>
          <div class="text-2xl font-bold">1800</div>
        </div>
        <div class="bg-green-500 text-white p-4 rounded-lg">
          <div class="text-lg">Nominal Terealisasi</div>
          <div class="text-2xl font-bold">Rp 100.000.000</div>
        </div>
      </div>

      <!-- Realisasi Proyek CSR -->
      <div class="bg-gray-50 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Realisasi Proyek CSR</h2>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Pie Chart -->
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Persentase total realisasi berdasarkan sektor CSR</h3>
            <div class="w-full h-48 bg-gray-200 rounded-lg"></div> <!-- Tempat untuk chart -->
          </div>

          <!-- Bar Chart -->
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Total realisasi sektor CSR</h3>
            <div class="w-full h-48 bg-gray-200 rounded-lg"></div> <!-- Tempat untuk chart -->
          </div>

          <!-- Realisasi Mitra -->
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Persentase total realisasi berdasarkan mitra</h3>
            <div class="w-full h-48 bg-gray-200 rounded-lg"></div> <!-- Tempat untuk chart -->
          </div>

          <!-- Realisasi Kecamatan -->
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Persentase total realisasi berdasarkan Kecamatan</h3>
            <div class="w-full h-48 bg-gray-200 rounded-lg"></div> <!-- Tempat untuk chart -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->

</body>
</html>

    
@endsection
