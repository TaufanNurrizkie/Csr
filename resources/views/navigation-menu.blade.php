<nav class="bg-white py-4 px-8 shadow-md flex justify-between items-center">
    <div class="flex items-center">
        <!-- Logo dan Teks -->
        <img src="{{ asset('cirebonLogo.png') }}" alt="Logo" class="h-10 mr-4">
    </div>
    <!-- Menu Navigasi -->
    <ul class="flex space-x-10 text-xl font-medium">
        <li><a href="/dashboard" wire:navigate class="{{ Request::is('dashboard*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Dashboard</a></li>
        <li><a href="/activities" wire:navigate class="{{ Request::is('activities*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Kegiatan</a></li>
        <li><a href="/projects" wire:navigate class="{{ Request::is('projects*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Proyek</a></li>
        <li><a href="/sektor" wire:navigate class="{{ Request::is('sektor*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Sektor</a></li>
        <li><a href="/reports" wire:navigate class="{{ Request::is('reports*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Laporan</a></li>
        <li><a href="/mitra" wire:navigate class="{{ Request::is('mitra*') ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-700 hover:text-red-600' }}">Mitra</a></li>
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
        <div class="relative" id="notification-icon">
            <svg class="w-8 h-8 text-gray-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="notification-btn">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m0 0v1a3 3 0 106 0v-1m-6 0h6" />
            </svg>
            <span id="notification-count" class="absolute top-0 right-0 inline-block w-5 h-5 bg-red-600 text-white text-xs font-bold rounded-full flex justify-center items-center">0</span>
            
        <!-- Dropdown Notifikasi -->
        <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg p-4 z-50 max-h-96 overflow-y-auto">
            <h3 class="font-bold mb-2">Notifikasi</h3>
            <div id="notification-list" class="space-y-4">
                <!-- Notifikasi akan dimuat di sini secara dinamis -->
                <p class="text-center text-gray-500">Tidak ada notifikasi baru</p>
            </div>
        </div>
    </div>
</nav>

<script>
    function fetchNotifications() {
    axios.get('/get-notifications')
    .then(response => {
        const notifications = response.data;

        let notificationList = document.getElementById('notification-list');
        notificationList.innerHTML = ''; // Kosongkan notifikasi lama

        // Tampilkan mitra baru
        notifications.newMitra.forEach(mitra => {
            let listItem = document.createElement('div');
            listItem.classList.add('p-3', 'bg-green-100', 'rounded-lg', 'shadow', 'hover:bg-green-200');
            listItem.innerHTML = `
                <div class="flex items-center">
                    <span class="font-bold text-green-600 mr-2">Mitra Baru:</span>
                    <a href="/mitra/${mitra.id}" class="text-gray-700">${mitra.nama_pt}</a>
                </div>
            `;
            notificationList.appendChild(listItem);
        });

        // Tampilkan laporan diterima (approved)
        notifications.newReports.forEach(report => {
            let listItem = document.createElement('div');
            let bgColor = report.status === 'approved' ? 'bg-blue-100' : 'bg-red-100'; // Tentukan warna berdasarkan status laporan
            let statusText = report.status === 'approved' ? 'Laporan Approved:' : 'Laporan Rejected:';
            let textColor = report.status === 'approved' ? 'text-blue-600' : 'text-red-600'; // Tentukan warna teks

            listItem.classList.add('p-3', bgColor, 'rounded-lg', 'shadow', 'hover:bg-opacity-75');
            listItem.innerHTML = `
                <div class="flex items-center">
                    <span class="font-bold ${textColor} mr-2">${statusText}</span>
                    <a href="/reports/${report.id}" class="text-gray-700">${report.title}</a>
                </div>
            `;
            notificationList.appendChild(listItem);
        });

        // Hitung jumlah total notifikasi
        let notificationCount = notifications.newMitra.length + notifications.newReports.length;
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