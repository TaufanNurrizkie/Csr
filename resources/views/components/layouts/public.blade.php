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
                <a href="/mitras"  wire:navigate class="{{ Request::is('mitra*') ? 'text-[#98100A] border-b-2 border-[#98100A] font-bold' : 'text-gray-700 hover:text-[#98100A] ' }}">Mitra</a>
            </li>
        </ul>




        <!-- Tombol Pengajuan -->
        <div>
            <a href="/pengajuan" wire:navigate class="px-4 py-2 bg-[#98100A] text-white rounded-md mr-10">Pengajuan</a>
        </div>


    </nav>




<main class="flex-grow">
    {{ $slot }}
    @yield('content')
</main>

<div class="container mx-auto px-4 py-12">
    <div class="bg-white shadow-md rounded-lg flex flex-wrap md:flex-nowrap p-8">
        <!-- Contact Information -->
        <div class="w-full md:w-1/2">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2 "></div>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
            <p class="text-gray-600 mb-6">Hubungi kami melalui formulir di samping, atau melalui kontak di bawah</p>

            <div class="space-y-4">
                <!-- Address -->
                <div class="flex items-start">
                    <div class="text-red-500 mr-4">
                        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Alamat</h3>
                        <p class="text-red-500">Jl. Sunan Kalijaga No.2, Sumber, Kec. Sumber, Kabupaten Cirebon, Jawa Barat 45611</p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex items-start">
                    <div class="text-red-500 mr-4">
                        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M6.62 10.79a15.91 15.91 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.26 1.12.31 2.33.48 3.57.48.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.24.17 2.45.48 3.57.1.35.01.74-.26 1.02l-2.2 2.2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Phone</h3>
                        <p class="text-red-500">(0231) 321677 / 0231 321792 atau</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start">
                    <div class="text-red-500 mr-4">
                        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 14c-2.67 0-5.2-1.06-7.07-2.93C6.93 15.86 8.93 14.5 12 14.5s5.07 1.36 7.07 3.57C17.2 18.94 14.67 20 12 20z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Email</h3>
                        <p class="text-red-500">pmtkc@cirebonkab.go.id</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="w-full md:w-1/2 mt-8 md:mt-0 md:ml-8">
            <iframe class="w-full h-64 rounded-md" src="https://maps.google.com/maps?q=Jl.%20Sunan%20Kalijaga%20No.2,%20Sumber,%20Kec.%20Sumber,%20Kabupaten%20Cirebon,%20Jawa%20Barat&output=embed" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>


<footer class="bottom-0 left-0 w-full bg-gray-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <p>&copy; 2024 Corporate Social Responsibility Kabupaten Cirebon</p>
            <p>Pemkab Kabupaten Cirebon, Badan Pendapatan Daerah (Bapenda) Kabupaten Cirebon.</p>
        </div>
        <div>
            <a href="/" class="border border-white text-white py-2 px-4 rounded hover:bg-white hover:text-gray-900 transition duration-300">
                Kembali Ke Halaman Utama
            </a >
        </div>
    </div>
</footer>
<!-- Tambahkan jQuery dan jQuery UI dari CDN -->
<x-sweet-alert />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
