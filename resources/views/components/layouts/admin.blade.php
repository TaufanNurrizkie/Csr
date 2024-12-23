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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <li><a href="/admin/dashboard" wire:navigate
                    class="{{ Request::is('admin/dashboard*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Dashboard</a>
            </li>
            <li><a href="/admin/activities" wire:navigate
                    class="{{ Request::is('admin/activities*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Kegiatan</a>
            </li>
            <li><a href="/admin/projects" wire:navigate
                    class="{{ Request::is('admin/projects*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Proyek</a>
            </li>
            <li><a href="/admin/sektors" wire:navigate
                    class="{{ Request::is('admin/sektor*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Sektor</a>
            </li>
            <li><a href="/admin/reports" wire:navigate
                    class="{{ Request::is('admin/reports*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Laporan</a>
            </li>
            <li><a href="/admin/mitra" wire:navigate
                    class="{{ Request::is('admin/mitra*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Mitra</a>
            </li>
        </ul>


        <!-- Info User dan Notifikasi -->
        <div class="flex items-center space-x-6">
            <div class="text-right">
                <p class="text-lg font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-sm text-gray-500">{{ Auth::user()->getRoleNames()->join(', ') }}</p>
            </div>
            <!-- Icon User -->
            <div class="shrink-0 me-3">
                <a href="{{ route('profile.show') }}" wire:navigate>
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </a>
            </div>
            <!-- Notifikasi -->
            <div class="relative" id="notification-icon">
                <svg class="w-8 h-8 text-gray-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" id="notification-btn">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m0 0v1a3 3 0 106 0v-1m-6 0h6" />
                </svg>
                <span id="notification-count"
                    class="absolute top-0 right-0 inline-block w-5 h-5 bg-red-600 text-white text-xs font-bold rounded-full flex justify-center items-center">0</span>

                <!-- Dropdown Notifikasi -->
                <div id="notification-dropdown"
                    class="hidden absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg p-4 z-50 max-h-96 overflow-y-auto">
                    <h3 class="font-bold mb-2">Notifikasi</h3>
                    <div id="notification-list" class="space-y-4">
                        <!-- Notifikasi akan dimuat di sini secara dinamis -->
                        <p class="text-center text-gray-500">Tidak ada notifikasi baru</p>
                    </div>
                </div>


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
                <a href="/admin/dashboard" wire:navigate
                    class="border border-white text-white py-2 px-4 rounded hover:bg-white hover:text-gray-900 transition duration-300">
                    Kembali Ke Halaman Utama
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/notifications.js') }}"></script>

    <x-sweet-alert />

    @livewireScripts
    <script>
        Livewire.hook('message.processed', (message, component) => {
            if (typeof ApexCharts !== 'undefined') {
                ApexCharts.exec("chart-id", "updateOptions", {});
            }
        });

        // Fungsi untuk mengambil dan menampilkan notifikasi
        function fetchNotifications() {
            axios.get('/get-notifications')
                .then(response => {
                    const notifications = response.data;

                    let notificationList = document.getElementById('notification-list');
                    notificationList.innerHTML = ''; // Kosongkan notifikasi lama

                    // Tampilkan mitra baru
                    notifications.newMitra.forEach(mitra => {
                        let listItem = document.createElement('div');
                        listItem.classList.add('p-3', 'bg-green-100', 'rounded-lg', 'shadow',
                            'hover:bg-green-200');
                        listItem.innerHTML = `
                <div class="flex items-center">
                    <span class="font-bold text-green-600 mr-2">Mitra Baru:</span>
                    <a href="mitra/${mitra.id}" class="text-gray-700">${mitra.nama_pt}</a>
                </div>
            `;
                        notificationList.appendChild(listItem);
                    });

                    // Tampilkan laporan diterima (approved), ditolak (rejected), dan revisi
                    notifications.newReports.forEach(report => {
                        let listItem = document.createElement('div');
                        let bgColor, statusText, textColor;

                        // Tentukan warna dan teks berdasarkan status laporan
                        if (report.status === 'approved') {
                            bgColor = 'bg-blue-100';
                            statusText = 'Laporan Diterima:';
                            textColor = 'text-blue-600';
                        } else if (report.status === 'rejected') {
                            bgColor = 'bg-red-100';
                            statusText = 'Laporan Rejected:';
                            textColor = 'text-red-600';
                        } else if (report.status === 'revisi') {
                            bgColor = 'bg-yellow-100';
                            statusText = 'Laporan Revisi:';
                            textColor = 'text-yellow-600';
                        } else if (report.status === 'pending') {
                            bgColor = 'bg-[#EFF8FF]';
                            statusText = 'Laporan Baru:';
                            textColor = 'text-[#175CD3]';
                        }

                        // Set class dan konten list item
                        listItem.classList.add('p-3', bgColor, 'rounded-lg', 'shadow', 'hover:bg-opacity-75');
                        listItem.innerHTML = `
        <div class="flex items-center">
            <span class="font-bold ${textColor} mr-2">${statusText}</span>
            <a href="reports/${report.id}" class="text-gray-700">${report.title}</a>
        </div>
    `;
                        notificationList.appendChild(listItem);
                    });


                    // Tampilkan pengajuan baru
                    notifications.newPengajuan.forEach(pengajuan => {
                        let listItem = document.createElement('div');
                        listItem.classList.add('p-3', 'bg-yellow-100', 'rounded-lg', 'shadow',
                            'hover:bg-yellow-200');
                        listItem.innerHTML = `
                <div class="flex items-center">
                    <span class="font-bold text-yellow-600 mr-2">Pengajuan Baru:</span>
                    <a href="/pengajuan/${pengajuan.id}" class="text-gray-700">${pengajuan.nama_lengkap}</a>
                </div>
            `;
                        notificationList.appendChild(listItem);
                    });

                    // Hitung jumlah total notifikasi
                    let notificationCount = notifications.newMitra.length + notifications.newReports.length +
                        notifications.newPengajuan.length;
                    document.getElementById('notification-count').textContent = notificationCount;
                })
                .catch(error => {
                    console.error("Terjadi kesalahan saat mengambil notifikasi: ", error);
                });
        }




        // Menampilkan atau menyembunyikan dropdown notifikasi
        document.getElementById('notification-btn').addEventListener('click', () => {
            const dropdown = document.getElementById('notification-dropdown');
            dropdown.classList.toggle('hidden');
        });

        // Memanggil fungsi fetchNotifications setiap 30 detik
        setInterval(fetchNotifications, 30000);

        // Panggil fetchNotifications saat halaman pertama kali dimuat
        fetchNotifications();
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</body>

</html>
