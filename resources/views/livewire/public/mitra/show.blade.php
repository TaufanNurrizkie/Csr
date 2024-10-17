<div class="bg-gray-50 min-h-screen">

    <!-- Header Section -->
    <header class="relative" style="width: 1440px; height: 450px; overflow: hidden;">
        <svg width="550" height="450" viewBox="0 0 602 450" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0">
            <rect width="602" height="450" fill="#510300"/>
        </svg>
        <!-- Image overlay -->
        <div class="absolute inset-0" style="top: 50%; left: 53%; width: 100%; height: 70%; transform: translate(-50%, -50%);">
            <img src="{{ asset('backgroundPublic.png') }}" alt="Overlay Image" class="w-full h-full object-cover">
            <!-- Dimmed overlay -->
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        <!-- Mitra Name and Company -->
        <div class="absolute inset-0 flex items-center justify-start pl-20" style="top: 50%; transform: translateY(-50%);">
            <div class="relative z-10 text-white text-left flex flex-col ml-20"> <!-- Menambahkan margin kiri -->
                <p class="text-lg">
                    <span class="text-[#E66445]">Beranda</span> /
                    <span class="text-[#E66445]">Mitra</span>   /
                    <span class="text-white">Detail</span>
                </p>
                <h1 class="text-7xl font-bold">{{ $mitra->nama_pt}}</h1>
                <p class="mt-2 text-sm">{{ $mitra->nama_pt }} • {{ $mitra->email }} • {{ $mitra->no_telp }}</p>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-8 bg-white shadow-lg rounded-3xl mt-6 md:mt-8">
        <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama_pt }}" 
             class="block mx-auto object-cover rounded-lg shadow-md mb-6" 
             style="width: 500px; height: 500px;">

        <!-- Mitra Description -->
        <section class="mt-4">
            <h2 class="text-2xl font-bold mb-4">{{ $mitra->nama }}</h2>
            <p class="text-gray-800 leading-relaxed mb-4">{{ $mitra->deskripsi }}</p>
        </section>

        <!-- Mitra Contact Information -->
        <section class="mt-8 bg-gray-100 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Kontak Mitra</h3>
            <p><strong>Email:</strong> <a href="mailto:{{ $mitra->email }}" class="text-blue-500">{{ $mitra->email }}</a></p>
            <p><strong>No Telepon:</strong> <a href="tel:{{ $mitra->no_telp }}" class="text-blue-500">{{ $mitra->no_telp }}</a></p>
            <p><strong>Alamat:</strong> {{ $mitra->alamat }}</p>
        </section>
    </main>

    <!-- Other Mitra Content Section -->
    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-bold mb-4 text-center">Laporan Dari Mitra</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Example of other content from mitra (could be reports, activities, etc.) -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('placeholder.png') }}" alt="Laporan Mitra" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="mt-3 text-xl font-bold">Judul Kegiatan</h5>
                    <p class="mt-2 text-gray-600">Deskripsi singkat dari kegiatan atau laporan mitra.</p>
                    <a href="#" class="inline-block mt-4 text-blue-500 font-semibold hover:underline">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Hubungi Kami Section -->
    <div class="container mx-auto my-12">
        <div class="bg-white rounded-lg shadow-lg p-8 md:flex md:space-x-12">
            <!-- Info Kontak -->
            <div class="contact-info md:w-1/2 space-y-4">
                <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
                <p class="text-gray-600">Hubungi kami melalui kontak di bawah</p>

                <div class="space-y-4">
                    <!-- Alamat -->
                    <div class="flex items-start space-x-4">
                        <span class="text-red-500 text-2xl">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <div>
                            <h4 class="text-xl font-semibold">Alamat</h4>
                            <p class="text-gray-700">{{ $mitra->alamat }}</p>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="flex items-start space-x-4">
                        <span class="text-red-500 text-2xl">
                            <i class="fas fa-phone"></i>
                        </span>
                        <div>
                            <h4 class="text-xl font-semibold">Telepon</h4>
                            <p class="text-gray-700">{{ $mitra->no_telp }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <span class="text-red-500 text-2xl">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <div>
                            <h4 class="text-xl font-semibold">Email</h4>
                            <p class="text-gray-700">{{ $mitra->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Peta Lokasi -->
            <div class="map md:w-1/2 mt-8 md:mt-0">
                <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31693.25337038745!2d108.53208806664193!3d-6.717044799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee2b1c2d4a93f%3A0x4f4b7d9b9901306a!2sSumber%2C%20Kabupaten%20Cirebon%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1677624793881!5m2!1sid!2sid" 
                        width="100%" 
                        height="300" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
