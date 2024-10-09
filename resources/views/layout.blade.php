<body class="flex flex-col min-h-screen">
<nav class="bg-white py-4 px-8 shadow-md flex justify-between items-center">
    <div class="flex items-center">
        <!-- Logo dan Teks -->
        <img src="{{ asset('cirebonLogo.png') }}" alt="Logo" class="h-10 mr-4">
    </div>
    <!-- Menu Navigasi -->
    <ul class="flex space-x-10 text-xl font-medium">

        <li><a href="/dashboard" class="{{ Request::is('dashboard*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Dashboard</a></li>
        <li><a href="/activities" class="{{ Request::is('activities*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Kegiatan</a></li>
        <li><a href="/projects" class="{{ Request::is('projects*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Proyek</a></li>
        <li><a href="/sektor" class="{{ Request::is('sektor*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Sektor</a></li>
        <li><a href="/reports" class="{{ Request::is('reports*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Laporan</a></li>
        <li><a href="/mitra" class="{{ Request::is('mitra*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Mitra</a></li>
    </ul>
    

    <!-- Info User dan Notifikasi -->
    <div class="flex items-center space-x-6">
        <div class="text-right">
            <p class="text-lg font-semibold">{{ Auth::user()->name }}</p>
            <p class="text-sm text-gray-500">{{ Auth::user()->getRoleNames()->join(', ') }}</p>
        </div>
        <!-- Icon User -->
        <div class="shrink-0 me-3">
                <a href="{{ route('profile.show') }}">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </a>
            </div>
        <!-- Notifikasi -->
        <div class="relative">
            <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m0 0v1a3 3 0 106 0v-1m-6 0h6" />
            </svg>
            <!-- Badge Notifikasi -->
            <span class="absolute top-0 right-0 inline-block w-5 h-5 bg-red-600 text-white text-xs font-bold rounded-full flex justify-center items-center">99</span>
        </div>
    </div>
</nav>

<main class="flex-grow">
@yield('content')
</main>

<footer class=" bottom-0 left-0 w-full bg-gray-800 text-white p-4">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 CSR Kabupaten Cirebon | Semua hak dilindungi undang-undang</p>
    </div>
</footer>
</body>