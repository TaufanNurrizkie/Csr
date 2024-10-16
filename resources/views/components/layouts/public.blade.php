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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @livewireStyles
</head>
<body class="flex flex-col min-h-screen">
    <nav class="flex justify-between items-center p-4 bg-white border-b ">
        <!-- Isi Navbar -->

        <div class="flex items-center pl-20">
            <img src="{{ asset('cirebonLogo.png') }}" alt="Logo" class="h-10 mr-4">
        </div>

        <!-- Menu Navigasi di Tengah -->
        <ul class="flex-1 flex justify-center space-x-10 text-xl font-medium">
            <li>
                <a href="/" wire:navigate class="{{ Request::is('beranda*') ? 'text-[#98100A] border-b-2 border-[#98100A] font-bold' : 'text-gray-700 hover:text-[#98100A] ' }}">Beranda</a>
            </li>
            <li>
                <a href="/tentang" wire:navigate class="{{ Request::is('tentang*') ? 'text-[#98100A] border-b-2 border-[#98100A] font-bold' : 'text-gray-700 hover:text-[#98100A] ' }}">Tentang</a>
            </li>
            <li>
                <a href="/kegiatan" wire:navigate class="{{ Request::is('kegiatan*') ? 'text-[#98100A] border-b-2 border-[#98100A] font-bold' : 'text-gray-700 hover:text-[#98100A] ' }}">Kegiatan</a>
            </li>
            <li>
                <a href="/statistik" wire:navigate class="{{ Request::is('statistik*') ? 'text-[#98100A] border-b-2 border-[#98100A] font-bold' : 'text-gray-700 hover:text-[#98100A] ' }}">Statistik</a>
            </li>
            <li>
                <a href="/sektor" wire:navigate class="{{ Request::is('sektor*') ? 'text-[#98100A] border-b-2 border-[#98100A] font-bold' : 'text-gray-700 hover:text-[#98100A] ' }}">Sektor</a>
            </li>
            <li>
                <a href="/laporan" wire:navigate class="{{ Request::is('laporan*') ? 'text-[#98100A] border-b-2 border-[#98100A] font-bold' : 'text-gray-700 hover:text-[#98100A] ' }}">Laporan</a>
            </li>
            <li>
                <a href="/mitra"  wire:navigate class="{{ Request::is('mitra*') ? 'text-[#98100A] border-b-2 border-[#98100A] font-bold' : 'text-gray-700 hover:text-[#98100A] ' }}">Mitra</a>
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
<!-- Tambahkan jQuery dan jQuery UI dari CDN -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function() {
        $('#yearPicker').datepicker({
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy', // Format hanya tahun
            onClose: function(dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 1));
            }
        });
    });
</script>
@livewireScripts
</body>
</html>
