<div class="bg-gray-100 min-h-screen flex flex-col items-start justify-start py-8 px-4 ">
    <nav class="flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8 ml-32 ">
        <!-- Icon home -->
        <a href="/mitra/dashboard" wire:navigate class="text-black">
            <img src="{{ asset('home.png') }}" alt="" class="w-8 h-8" >
        </a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <!-- Kegiatan link -->
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Profile</span>
    </nav>

    <div class="bg-gray-100 flex items-center justify-center h-screen">
        <div class="bg-white shadow-lg rounded-lg p-8 w-4/5 relative">
            <!-- Header dengan tombol ubah profil -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Profil Mitra</h2>
                <a href="{{ route('profil-mitra.ubah') }}" wire:navigate class="bg-[#98100A] text-white px-4 py-2 rounded-lg flex items-center">
                    <img src="{{ asset('pen.png') }}" alt="Ubah Profil" class="h-5 w-5 mr-2"> <!-- Ukuran gambar dan margin -->
                    Ubah Profil
                </a>
            </div>

            <!-- Konten utama -->
            <div class="flex space-x-8">
                <!-- Gambar Placeholder -->
                <div class="bg-blue-100 rounded-lg w-96 h-56"></div>

                <!-- Detail mitra -->
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold text-gray-900">Nama Mitra</h2>
                    <p class="text-gray-600 mb-4">PT Mitra Sejahtera Bersama</p>

                    <!-- Informasi Kontak -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="bg-red-100 p-2 rounded-full flex items-center justify-center w-10 h-10"> <!-- Ukuran yang konsisten -->
                                <img src="{{ asset('pesan.png') }}" alt="" class="h-6 w-6"> <!-- Ukuran gambar -->
                            </div>
                            <p class="text-gray-700">info@email.com</p>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="bg-red-100 p-2 rounded-full flex items-center justify-center w-10 h-10"> <!-- Ukuran yang konsisten -->
                                <img src="{{ asset('telpon.png') }}" alt="" class="h-6 w-6"> <!-- Ukuran gambar -->
                            </div>
                            <p class="text-gray-700">0821 #### ####</p>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="bg-red-100 p-2 rounded-full flex items-center justify-center w-10 h-10"> <!-- Ukuran yang konsisten -->
                                <img src="{{ asset('map.png') }}" alt="" class="h-6 w-6"> <!-- Ukuran gambar -->
                            </div>
                            <p class="text-gray-700">Jl. Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>

                    <!-- Deskripsi CSR -->
                    <p class="text-gray-700">
                        Maksud pemerintah kabupaten dalam Corporate Social Responsibility (CSR) adalah untuk menciptakan sinergi yang kuat antara pemerintah, perusahaan, dan masyarakat. Tujuan utama dari upaya ini adalah untuk mendorong pembangunan berkelanjutan di wilayah kabupaten. Dengan melibatkan perusahaan dalam program CSR, diharapkan dapat tercipta solusi komprehensif bagi berbagai permasalahan sosial dan lingkungan, sehingga kesejahteraan masyarakat dapat meningkat secara signifikan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
