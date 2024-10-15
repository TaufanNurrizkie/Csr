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
<nav class="bg-white py-4 px-8 shadow-md flex justify-between items-center">
    <div class="flex items-center">
        <!-- Logo dan Teks -->
        <img src="{{ asset('cirebonLogo.png') }}" alt="Logo" class="h-10 mr-4">
    </div>
    <!-- Menu Navigasi -->
    <ul class="flex space-x-10 text-xl font-medium">
        <li><a href="/dashboard" wire:navigate class="{{ Request::is('dashboard*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Dashboard</a></li>
        <li><a href="/activities" wire:navigate class="{{ Request::is('activities*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Kegiatan</a></li>
    </ul>
    



        </div>
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
