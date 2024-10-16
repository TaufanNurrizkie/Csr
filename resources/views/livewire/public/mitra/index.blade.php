<div class="bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <header class="relative" style="width: 1440px; height: 450px; overflow: hidden;">
        <svg width="550" height="450" viewBox="0 0 602 450" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0">
            <rect width="602" height="450" fill="#510300"/>
        </svg>
        <div class="absolute inset-0" style="top: 50%; left: 53%; width: 100%; height: 70%; transform: translate(-50%, -50%);">
            <img src="{{ asset('backgroundPublic.png') }}" alt="Overlay Image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="absolute inset-0 flex items-center justify-start pl-20" style="top: 50%; transform: translateY(-50%);">
            <div class="relative z-10 text-white text-left flex flex-col ml-20"> <!-- Menambahkan margin kiri -->
                <p class="text-lg">
                    <span class="text-[#E66445]">Beranda</span> /
                    <span class="text-white">Mitra</span>
                </p>
                <h1 class="text-7xl font-bold">Mitra</h1>
                <p class="mt-2 text-sm">Mitra CSR Kabupaten Cirebon</p>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto my-8">
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-4">
                <select class="form-select bg-white border-gray-300 rounded-md">
                    <option>Laporan Terbanyak</option>
                </select>
            </div>
            <input type="text" class="form-input border-gray-300 rounded-md" placeholder="Cari kegiatan...">
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($mitras as $mitra)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <!-- Make image clickable by wrapping it in a link -->
                <a href="{{ route('mitra.show', $mitra->id) }}">
                    <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama_pt }}" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <!-- Make title clickable by wrapping it in a link -->
                    <a href="{{ route('mitra.show', $mitra->id) }}">
                        <h5 class="mt-3 text-xl font-bold">{{ $mitra->nama_pt }}</h5>
                    </a>
                    <p class="text-gray-600">{{ $mitra->nama }}</p>
                    <p class="text-gray-600">{{ Str::limit($mitra->deskripsi, 100) }}</p>
                    <a href="mailto:{{ $mitra->email }}" class="inline-block mt-2 text-blue-500 font-semibold hover:underline">Hubungi: {{ $mitra->email }}</a>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>

    <!-- Hubungi Kami Section -->
    <div class="container mx-auto my-12">
        <div class="bg-white rounded-lg shadow-lg p-8 md:flex md:space-x-12">
            <div class="contact-info md:w-1/2 space-y-4">
                <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
                <p class="text-gray-600">Hubungi kami melalui formulir di samping, atau melalui kontak di bawah</p>
                <div class="space-y-4">
                    <div class="flex items-start space-x-4">
                        <span class="text-red-500 text-2xl">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <div>
                            <h4 class="text-xl font-semibold">Alamat</h4>
                            <p class="text-gray-700">Jl. Sunan Kalijaga No. 7, Sumber, Kabupaten Cirebon, Jawa Barat 45611</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <span class="text-red-500 text-2xl">
                            <i class="fas fa-phone"></i>
                        </span>
                        <div>
                            <h4 class="text-xl font-semibold">Telepon</h4>
                            <p class="text-gray-700">(0231) 321197 atau (0231) 3211792</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <span class="text-red-500 text-2xl">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <div>
                            <h4 class="text-xl font-semibold">Email</h4>
                            <p class="text-gray-700">pemkab@cirebonkab.go.id</p>
                        </div>
                    </div>
                </div>
            </div>

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
