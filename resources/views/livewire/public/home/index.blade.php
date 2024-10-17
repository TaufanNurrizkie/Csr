<div>
  <div class="container mx-auto  relative" style="width: 1344px; height: 810px; overflow: hidden;">
    <!-- Hero Section -->
    <div class="hero-section relative" style="width: 100%; height: 100%; overflow: hidden;">
        <svg width="550" height="750" viewBox="0 0 602 750" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0">
            <rect width="602" height="750" fill="#510300"/>
        </svg>

        <!-- Background and overlay -->
        <div class="absolute inset-0" style="top: 44%; left: 53%; width: 100%; height: 70%; transform: translate(-50%, -50%);">
            <img src="{{ asset('backgroundPublic.png') }}" alt="Overlay Image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        
        <!-- Text content -->
        <div class="relative z-10 text-white text-start flex flex-col justify-center ml-16 items-start h-full">
            <h1 class="text-4xl font-bold md:text-5xl">Selamat datang <br> di portal CSR <br> Kab. Cirebon</h1>
            <p class="mt-2 text-lg">Ketahui dan kenali customer social responsibility <br> terhadap Kabupaten Cirebon dari para Mitra.</p>
            <div class="w-40 h-1 bg-white mb-2"></div>
        </div>

        <!-- News Card -->
        <div class="absolute bottom-16 right-16 bg-gray-900 text-white p-6 rounded-lg shadow-lg w-[500px]">
            <h2 class="text-2xl font-semibold mb-2">Pemkab Cirebon Terima Bantuan PJU Tematik Dari Bank BJB</h2>
            <p class="text-sm text-gray-400 mb-4">11 Oktober 2024</p>
            <p class="text-base">
                Penerangan Jalan Umum (PJU) di Kecamatan Lemahabang Desa Cipeujeuh Barat Kab. Cirebon, Jawa Barat, kini telah mendapat bantuan. CSR ini disalurkan langsung oleh CSR Bank BJB bersama dengan Pemkab Cirebon dalam upaya meningkatkan kenyamanan masyarakat setempat...
            </p>
            <a href="#" class="text-red-500 mt-4 inline-block hover:underline">Baca selengkapnya</a>
        </div>
    </div>
</div>



    <!-- CSR Partners Section -->
    <section class="py-5 bg-gray-50 mt-2">
        <div class="container mx-auto">
          <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div> <!-- Garis merah di atas -->
            <h2 class="text-3xl font-semibold mb-12 text-start">Mitra CSR <br> Kabupaten Cirebon</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-2 items-center"> <!-- Adjusted gap to 2 -->
                @foreach ($mitras as $item)
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto {{ $item->name }}" class="w-40 h-auto object-cover rounded mx-auto">
                @endforeach
            </div>
        </div>
    </section>

  <div class="flex flex-col items-center py-4">
      <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div> <!-- Garis merah di atas -->
      <h2 class="text-3xl font-extrabold text-center mb-4">Data Statistik</h2>
  </div>
    <div class="container mx-auto px-6 mt-6"> <!-- Menambahkan margin atas pada container ini -->
      <div class="grid grid-cols-4 gap-4 text-left items-center">
          <!-- Kolom 1 -->
          <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
              <div>
                  <h3 class="text-5xl font-bold text-[#510300] mb-2">{{ $jumlahCSR }}</h3> <!-- Menambahkan margin bawah -->
                  <p class="text-lg font-medium text-gray-800">Total Proyek CSR</p>
              </div>
          </div>
          <!-- Kolom 2 -->
          <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
              <div>
                  <h3 class="text-5xl font-bold text-[#510300] mb-2">{{ $jumlahProyekTerealisasi }}</h3> <!-- Menambahkan margin bawah -->
                  <p class="text-lg font-medium text-gray-800">Proyek terealisasi</p>
              </div>
          </div>
          <!-- Kolom 3 -->
          <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
              <div>
                  <h3 class="text-5xl font-bold text-[#510300] mb-2">{{ $jumlahMitra }}</h3> <!-- Menambahkan margin bawah -->
                  <p class="text-lg font-medium text-gray-800">Mitra bergabung</p>
              </div>
          </div>
          <!-- Kolom 4 -->
          <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
              <div>
                  <h3 class="text-5xl font-bold text-[#510300] mb-2"> {{ 'Rp' . number_format($totalDanaCsr, 0, ',', '.') }}</h3> <!-- Menambahkan margin bawah -->
                  <p class="text-lg font-medium text-gray-800">Dana realisasi CSR</p>
              </div>
          </div>
      </div>
  </div>


    <!-- CSR Activities Section -->
    <section class="py-24 bg-gray-50 mt-4 ml-40">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="grid grid-cols-4 gap-4">
                <!-- Top-left image -->
                <!-- Top-right image -->
                <div class="col-span-2 pl-16">
                  <img src="{{ asset('aboutCsr2.png') }}" alt="Image 2">
                </div>
                <div class="col-span-2">
                  <img src="{{ asset('aboutCsr1.png') }}" alt="Image 1">
                </div>
                <!-- Bottom-left image, shifted to the left -->
                <div class="col-span-2 col-start-1">
                  <img src="{{ asset('aboutCsr3.png') }}" alt="Image 3">
                </div>
              </div>
              
            <div class="w-full md:w-1/2 px-6 md:px-12">
              <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div> <!-- Garis merah di atas -->
                <h2 class="text-2xl font-bold mb-4">Apa Itu Kegiatan CSR?</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Corporate Social Responsibility (CSR) merupakan konsep di mana perusahaan secara sadar mengintegrasikan kepedulian sosial dan lingkungan dalam operasi bisnisnya. Ini melibatkan tindakan sukarela yang memberikan manfaat bagi masyarakat, seperti program pendidikan, kesehatan, dan lingkungan, serta upaya untuk mengurangi dampak negatif terhadap lingkungan. CSR tidak hanya mencerminkan tanggung jawab perusahaan terhadap masyarakat, tetapi juga dapat meningkatkan reputasi dan daya saing bisnis.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Berdasarkan Undang-Undang nomor 40 Tahun 2007 tentang Perseroan Terbatas (UUPT) pasal 1 ayat 3, pengertian Tanggung Jawab Sosial dan Lingkungan Perusahaan (TJSL) adalah Corporate Social Responsibility (CSR) adalah komitmen perusahaan untuk berperan serta dalam pembangunan ekonomi berkelanjutan guna meningkatkan kualitas kehidupan yang bermanfaat, baik bagi perseroan sendiri, komunitas setempat, maupun masyarakat pada umumnya.
                </p>
            </div>
        </div>
    </section>

    <div class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-8">
      <div class="max-w-6xl w-full mx-auto flex space-x-8">
        <!-- Sidebar -->
        <div class="w-1/3">
          <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div> <!-- Garis merah di atas -->
          <h2 class="text-xl font-bold mb-4">Sektor CSR</h2>
          <p class="text-sm mb-6">Bidang sektor CSR Kabupaten Cirebon yang tersedia</p>
          <ul class="space-y-2">
            @foreach ($sektors as $sektors)
            {{-- <li>
              <button class="w-full text-left py-2 px-4 {{ $loop->first ? 'bg-red-500' : 'hover:bg-gray-800' }} rounded text-sm">
                {{ $sektors->nama }}
              </button>
            </li> --}}
            
              <div class=" border-l-4 border-red-600  shadow-lg p-4 hover:bg-gray-700 cursor-pointer">
                <a id="q1" class="text-lg font-semibold flex justify-between items-center">
                  <span>{{ $sektors->nama }}</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            
            @endforeach
          </ul>
        </div>
    
        <!-- Content Section -->
        <div class="w-2/3 flex">
          <div class="w-full">
            <div class="w-full mb-4">
              <img src="{{ asset('aboutCsr1.png') }}" alt="Image" class="rounded w-full">
            </div>
            <p class="text-sm mb-4">
              CSR dalam lingkup sosial merupakan komitmen perusahaan untuk memberikan kontribusi positif bagi masyarakat sekitar...
            </p>
            <div class="space-x-4">
              <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">
                Lihat program tersedia
              </button>
              <button class="border border-gray-500 text-gray-300 py-2 px-4 rounded hover:bg-gray-700">
                Lihat realisasi program
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white min-h-screen flex items-center justify-center p-8">
      <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-0 bg-gray-50 shadow-lg rounded-lg overflow-hidden">
          <!-- Text Section -->
          <div class="p-12 flex flex-col justify-center">
              <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div> <!-- Garis merah di atas -->
              <h2 class="text-3xl font-bold text-gray-800 mb-4">Sambutan Bupati Kabupaten Cirebon</h2>
              <p class="text-gray-600 mb-6">
                  Elt sit vitae nulla porttitor nulla platea lectus ultrices cursus. Proin mi mi nisl sed amet. Aliquam sit sed turpis eu sodis consequat nibh enim malesuada. Eget vestibulum volutpat cursus enim. Utam meacenas et sed dignissim augue aliquam. In tend condementium ultrices sit proin egestas. Nunc eget quisque vestibulum vestibulum ultrices ipsum gravida malesuada.
              </p>
              <p class="text-gray-600 mb-4">
                  Posuere malesuada vehicula nunc adipiscing senectus. Leo sodales placerat enim et porttitor facilisis. Sagitis vehare ut nunc vel. Eismod aliquat ullamcorper felis et ante egestas.
              </p>
              <div class="mt-6">
                  <p class="font-semibold text-gray-800">Drs. H. Imron Rosyadi, Lc., M.Ag., M.M.</p>
                  <p class="text-gray-500">Bupati Kabupaten Cirebon</p>
              </div>
          </div>
          
          <!-- Image Section -->
          <div class="flex items-center justify-end">
              <img src="{{ asset('Sambutan.png') }}" alt="Bupati Kabupaten Cirebon" class=" w-full h-auto">
          </div>
      </div>
  </div>
  

  <div class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="w-10 h-1 bg-[#FF5D56] mb-2 mx-auto"></div>
 <!-- Garis merah di atas -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Kegiatan Terbaru</h2>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($aktivitas as $aktif)
            <!-- Card -->
            <div class="bg-white shadow-lg overflow-hidden">
                <!-- Use dynamic image path -->
                <img src="{{ asset('storage/' . $aktif->photo) }}" alt="Kegiatan" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="inline-block bg-red-600 text-white text-xs px-2 py-1 rounded mb-2">{{ $aktif->published_date }}</span>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $aktif->title }}</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        {{ $aktif->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="flex justify-center mt-8">
            <a href="#" class="border-2 border-gray-300 text-gray-600 hover:text-blue-700 hover:border-blue-700 font-semibold py-2 px-6 rounded">
                Lihat semua kegiatan
            </a>
        </div>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="w-10 h-1 bg-[#FF5D56] mb-2 mx-auto"></div>
 <!-- Garis merah di atas -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Laporan Program <br> Terbaru</h2>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($reports as $report)
            <!-- Card -->
            <div class="bg-white shadow-lg overflow-hidden">
                <!-- Use dynamic image path -->
                <img src="{{ asset('storage/' . $report->foto) }}" alt="Kegiatan" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="inline-block bg-red-600 text-white text-xs px-2 py-1 rounded mb-2">{{ $report->tgl_realisasi }}</span>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $report->title }}</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        {{ $report->deskripsi }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="flex justify-center mt-8">
            <a href="#" class="border-2 border-gray-300 text-gray-600 hover:text-blue-700 hover:border-blue-700 font-semibold py-2 px-6 rounded">
                Lihat semua laporan
            </a>
        </div>
    </div>
</div>

<div class="bg-gray-900 text-white py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="w-10 h-1 bg-[#FF5D56] mb-2 "></div>
    <h2 class="text-3xl font-bold text-start mb-8">Frequently Asked Questions (FAQ)</h2>
    <h3 class="text-lg font-semibold mb-4">Pertanyaan yang sering muncul</h3>
    <div class="flex">
      <!-- Sidebar -->
      <div class="w-1/3 pr-8">
        <div class="">
          <div class=" border-l-4 border-red-600  shadow-lg p-4 hover:bg-gray-700 cursor-pointer">
            <a id="q1" class="text-lg font-semibold flex justify-between items-center">
              <span>Apa itu CSR?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
            <p class="mt-2 text-gray-400 hidden">CSR atau Corporate Social Responsibility adalah komitmen perusahaan untuk berkontribusi pada pembangunan ekonomi yang berkelanjutan.</p>
          </div>
          <div class=" border-l-4 border-gray-700  shadow-lg p-4 hover:bg-gray-700 cursor-pointer">
            <a id="q2" class="text-lg font-semibold flex justify-between items-center">
              <span>Mengapa CSR penting di Kabupaten Cirebon?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
            <p class="mt-2 text-gray-400 hidden">CSR membantu perkembangan sosial dan ekonomi di Kabupaten Cirebon.</p>
          </div>
          <div class=" border-l-4 border-gray-700  shadow-lg p-4 hover:bg-gray-700 cursor-pointer">
            <a id="q3" class="text-lg font-semibold flex justify-between items-center">
              <span>Bagaimana cara perusahaan di Kabupaten Cirebon menjalankan program CSR?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
            <p class="mt-2 text-gray-400 hidden">Perusahaan dapat menjalankan program CSR dengan melibatkan masyarakat.</p>
          </div>
          <div class=" border-l-4 border-gray-700  shadow-lg p-4 hover:bg-gray-700 cursor-pointer">
            <a id="q4" class="text-lg font-semibold flex justify-between items-center">
              <span>Apa saja contoh program CSR di Kabupaten Cirebon?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
            <p class="mt-2 text-gray-400 hidden">Contoh program CSR dapat berupa pendidikan, kesehatan, dan lingkungan hidup.</p>
          </div>
          <div class=" border-l-4 border-gray-700  shadow-lg p-4 hover:bg-gray-700 cursor-pointer">
            <a id="q5" class="text-lg font-semibold flex justify-between items-center">
              <span>Bagaimana pemerintah Kabupaten Cirebon mendukung program CSR?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
            <p class="mt-2 text-gray-400 hidden">Pemerintah Kabupaten Cirebon mendukung program CSR dengan menyediakan fasilitas dan regulasi.</p>
          </div>
        </div>
      </div>

      <!-- FAQ Content -->
      <div class="w-2/3">
        <div class=" p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-4">CSR di Kabupaten Cirebon</h3>
          <p class="text-gray-400">
            CSR atau Corporate Social Responsibility adalah komitmen perusahaan untuk berkontribusi dalam pembangunan berkelanjutan dengan cara memberikan dampak positif bagi masyarakat dan lingkungan sekitar. Di Kabupaten Cirebon, CSR dapat diwujudkan melalui berbagai program seperti pendidikan, kesehatan, lingkungan, dan pemberdayaan masyarakat.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>








  
  
      
</div>
