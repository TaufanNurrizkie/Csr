<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @livewireStyles
</head>
<body class="flex flex-col min-h-screen">
    <nav class="flex justify-between items-center p-4 bg-white border-b ">
        <!-- Isi Navbar -->
        <div class="flex items-center pl-7">
            <img src="{{ asset('cirebonLogo.png') }}" alt="Logo" class="h-10 mr-4">
        </div>
    
        <!-- Menu Navigasi di Tengah -->
        <ul class="flex-1 flex justify-center space-x-10 text-xl font-medium">
            <li>
                <a href="/beranda" class="{{ Request::is('beranda*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Beranda</a>
            </li>
            <li>
                <a href="/tentang" class="{{ Request::is('tentang*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Tentang</a>
            </li>
            <li>
                <a href="/kegiatan" class="{{ Request::is('kegiatan*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Kegiatan</a>
            </li>
            <li>
                <a href="/statistik" class="{{ Request::is('statistik*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Statistik</a>
            </li>
            <li>
                <a href="/sektor" class="{{ Request::is('sektor*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Sektor</a>
            </li>
            <li>
                <a href="/laporan" class="{{ Request::is('laporan*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Laporan</a>
            </li>
            <li>
                <a href="/mitra" class="{{ Request::is('mitra*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Mitra</a>
            </li>
        </ul>
    
        <!-- Tombol Pengajuan -->
        <div>
            <a href="/pengajuan" class="px-4 py-2 bg-[#98100A] text-white rounded-md mr-10">Pengajuan</a>
        </div>
        
    </nav>
    
    

<main class="flex-grow">
    {{ $slot }}
    @yield('content')
</main>

<footer class="bottom-0 left-0 w-full bg-gray-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <p>&copy; 2024 Corporate Social Responsibility Kabupaten Cirebon</p>
            <p>Pemkab Kabupaten Cirebon, Badan Pendapatan Daerah (Bapenda) Kabupaten Cirebon.</p>
        </div>
        <div>
            <a href="/dashboard" class="border border-white text-white py-2 px-4 rounded hover:bg-white hover:text-gray-900 transition duration-300">
                Kembali Ke Halaman Utama
            </a >
        </div>
    </div>
</footer>

@livewireScripts
</body>
</html>
