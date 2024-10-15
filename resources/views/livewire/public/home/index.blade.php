<div>
    <div class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('backgroundPublic.png') }}');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-70"></div>

        <!-- Main Content -->
        <div class="container mx-auto flex flex-col items-start justify-center h-full px-8">
            <div class="text-white max-w-lg">
                <h1 class="text-5xl font-bold mb-6">Selamat Datang Di Portal CSR Kab. Cirebon</h1>
                <p class="text-lg leading-relaxed">Ketahui dan kenali Customer Social Responsibility terhadap Kabupaten Cirebon dari para mitra.</p>
            </div>
        </div>
    </div>

    <!-- News Card -->
    <div class="container mx-auto mt-8 px-8">
        <div class="bg-gray-900 text-white p-6 rounded-lg shadow-lg flex">
            <div class="w-1 bg-red-600 mr-4"></div>
            <div>
                <h2 class="text-2xl font-semibold mb-2">Pemkab Cirebon Terima Bantuan PJU Tematik Dari Bank BJB</h2>
                <p class="text-sm text-white-400 mb-4">11 Oktober 2024</p>
                <p class="text-base">
                    Penerangan Jalan Umum (PJU) di Kecamatan Lemahabang Desa Cipeujeuh Barat Kab. Cirebon, Jawa Barat, kini telah mendapat bantuan. CSR ini disalurkan langsung oleh CSR Bank BJB bersama dengan Pemkab Cirebon dalam upaya meningkatkan kenyamanan masyarakat setempat...
                </p>
                <a href="#" class="text-red-500 mt-4 inline-block hover:underline">Baca selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- CSR Partners Section -->
    <section class="py-24 bg-gray-50 mt-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-12 text-start">Mitra CSR <br> Kabupaten Cirebon</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-2 items-center"> <!-- Adjusted gap to 2 -->
                @foreach ($mitras as $item)
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto {{ $item->name }}" class="w-40 h-auto object-cover rounded mx-auto">
                @endforeach
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-12 text-center">Data Statistik</h2>
            <div class="flex flex-col md:flex-row justify-between items-center space-y-8 md:space-y-0">
                <div class="text-center">
                    <h3 class="text-4xl font-bold">{{ $jumlahMitra }}</h3>
                    <p class="text-gray-600">Total Mitra CSR</p>
                </div>
                <div class="text-center">
                    <h3 class="text-4xl font-bold">119</h3>
                    <p class="text-gray-600">Proyek selesai</p>
                </div>
                <div class="text-center">
                    <h3 class="text-4xl font-bold">89</h3>
                    <p class="text-gray-600">Mitra bergabung</p>
                </div>
                <div class="text-center">
                    <h3 class="text-4xl font-bold"> {{ 'Rp. ' . number_format($totalDanaCsr, 0, ',', '.') }}</h3>
                    <p class="text-gray-600">Investasi CSR</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CSR Activities Section -->
    <section class="py-24 bg-gray-50 mt-4">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="grid grid-cols-4 gap-4">
                <!-- Top-left image -->
                <div class="col-span-2">
                  <img src="{{ asset('aboutCsr1.png') }}" alt="Image 1">
                </div>
                <!-- Top-right image -->
                <div class="col-span-2">
                  <img src="{{ asset('aboutCsr2.png') }}" alt="Image 2">
                </div>
                <!-- Bottom-left image, shifted to the left -->
                <div class="col-span-2 col-start-2">
                  <img src="{{ asset('aboutCsr3.png') }}" alt="Image 3">
                </div>
              </div>
              
            <div class="w-full md:w-1/2 px-6 md:px-12">
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
          <h2 class="text-xl font-bold mb-4">Sektor CSR</h2>
          <p class="text-sm mb-6">Bidang sektor CSR Kabupaten Cirebon yang tersedia</p>
          <ul class="space-y-2">
            @foreach ($sektors as $sektors)
            <li>
              <button class="w-full text-left py-2 px-4 {{ $loop->first ? 'bg-red-500' : 'hover:bg-gray-800' }} rounded text-sm">
                {{ $sektors->nama }}
              </button>
            </li>
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
          <div class="relative flex items-center">
              <img src="{{ asset('Sambutan.png') }}" alt="Bupati Kabupaten Cirebon" class="object-cover w-full h-auto">
          </div>
      </div>
  </div>

  <div class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
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

<script>
  document.querySelectorAll('.cursor-pointer').forEach(item => {
    item.addEventListener('click', () => {
      const answer = item.nextElementSibling;
      answer.classList.toggle('hidden');
      const svgIcon = item.querySelector('svg');
      svgIcon.classList.toggle('rotate-90'); // Rotate the icon when clicked
    });
  });
</script>







  
  
      
</div>
