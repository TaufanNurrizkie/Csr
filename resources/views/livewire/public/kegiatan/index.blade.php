<div class="">
    <div class="hero-section relative" style="width: 1440px; height: 450px; overflow: hidden;">
        <svg width="550" height="450" viewBox="0 0 602 450" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0">
            <rect width="602" height="450" fill="#510300"/>
        </svg>
    
        <!-- Adjust the size and position of the gray overlay -->
        
        <div class="absolute inset-0" style="top: 50%; left: 53%; width: 100%; height: 70%; transform: translate(-50%, -50%);">
            <img src="{{ asset('backgroundPublic.png') }}" alt="Overlay Image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="absolute inset-0 flex items-center justify-start pl-20" style="top: 50%; transform: translateY(-50%);">
            <div class="relative z-10 text-white text-left flex flex-col ml-20"> <!-- Menambahkan margin kiri -->
                <p class="text-lg">
                    <span class="text-[#E66445]">Beranda</span> /
                    <span class="text-white">Kegiatan</span>
                </p>
                <h1 class="text-7xl font-bold">Kegiatan</h1>
                <p class="mt-2 text-sm">Kegiatan Terkini Dari CSR Kabupaten Cirebon</p>
            </div>
        </div>
    <!-- Hero Section -->
    </div>
    
    
    

    <!-- Filter and Search -->
    <div class="filter-section my-8 container mx-auto">
        <div class="flex justify-between items-center space-x-4">
            <div class="w-1/3">
                <select class="form-select w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option selected>Terbaru</option>
                    <option value="1">Kategori 1</option>
                    <option value="2">Kategori 2</option>
                </select>
            </div>
            <div class="w-1/3">
                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Cari kegiatan...">
            </div>
        </div>
    </div>

    <!-- Kegiatan Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 container mx-auto">
        @foreach($kegiatan as $item)
        <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">{{ \Carbon\Carbon::parse($item->published_date)->format('d M, Y') }}</span>
                <h5 class="mt-3 text-xl font-bold">{{ $item->title }}</h5>
                <p class="mt-2 text-gray-600">{{ Str::limit($item->description, 100) }}</p>
                <a href="{{ route('kegiatan.show', $item->id) }}" class="inline-block mt-4 text-blue-500 font-semibold hover:underline">Lihat Detail</a>
            </div>
        </div>
        @endforeach
    </div>


    
    <!-- Hubungi Kami Section -->
    <div class="container mx-auto my-12">
        <div class="bg-white rounded-lg shadow-lg p-8 md:flex md:space-x-12">
            <!-- Info Kontak -->
            <div class="contact-info md:w-1/2 space-y-4">
                <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
                <p class="text-gray-600">Hubungi kami melalui formulir di samping, atau melalui kontak di bawah</p>
                
                <div class="space-y-4">
                    <!-- Alamat -->
                    <div class="flex items-start space-x-4">
                        <span class="text-red-500 text-2xl">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <div>
                            <h4 class="text-xl font-semibold">Alamat</h4>
                            <p class="text-gray-700">Jl. Sunan Kalijaga No. 7, Sumber, Kec. Sumber, Kabupaten Cirebon, Jawa Barat 45611</p>
                        </div>
                    </div>
                    
                    <!-- Telepon -->
                    <div class="flex items-start space-x-4">
                        <span class="text-red-500 text-2xl">
                            <i class="fas fa-phone"></i>
                        </span>
                        <div>
                            <h4 class="text-xl font-semibold">Telepon</h4>
                            <p class="text-gray-700">(0231) 321107 atau (0231) 3211792</p>
                        </div>
                    </div>
                    
                    <!-- Email -->
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
