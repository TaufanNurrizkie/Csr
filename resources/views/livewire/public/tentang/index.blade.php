<div>
        <!-- Hero Section -->
        <div class="hero-section relative w-full h-[450px] overflow-hidden -mt-5"> <!-- -mt-10 untuk menggeser ke atas -->
            <svg width="550" height="450" viewBox="0 0 602 450" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0">
                <rect width="602" height="450" fill="#510300"/>
            </svg>
            <!-- Adjust the size and position of the gray overlay -->

            <div class="absolute inset-0" style="top: 50%; left: 50%;  width: 93%; height: 70%; transform: translate(-50%, -50%);">
                <img src="{{ asset('backgroundPublic.png') }}" alt="Overlay Image" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-70"></div>
            </div>
            <div class="absolute inset-0 flex items-center justify-start pl-20" style="top: 50%; transform: translateY(-50%);">
                <div class="relative z-10 text-white text-left flex flex-col ml-20"> <!-- Menambahkan margin kiri -->
                    <p class="text-lg">
                        <a href="/" class="text-[#E66445]">Beranda</a> /
                        <a class="text-white">Tentang</a>
                    </p>
                    <h1 class="text-7xl font-bold">Tentang</h1>
                    <p class="mt-2 text-sm">Tentang Csr Kabupaten Cirebon</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-12">
    <div class="max-w-5xl mx-auto">
        <!-- Judul -->
        <div class="flex items-start mb-6">
            <h2 class="text-5xl font-bold text-gray-800 mr-60">
                Apa Itu
               <span>Kegiatan CSR?</span>
            </h2>
            <p class="text-sm text-gray-600 leading-relaxed mt-2">
                Corporate Social Responsibility (CSR) merupakan konsep di mana perusahaan secara sadar mengintegrasikan kepedulian sosial dan lingkungan ke dalam operasional bisnisnya. Ini melibatkan tindakan sukarela yang memberikan manfaat bagi masyarakat, seperti program pendidikan, kesehatan, dan lingkungan, serta upaya untuk mengurangi dampak negatif terhadap lingkungan. CSR tidak hanya mencerminkan tanggung jawab perusahaan terhadap masyarakat, tetapi juga dapat meningkatkan reputasi dan daya saing bisnis.
            </p>
        </div>




        <!-- Garis bawah (border dotted) -->

        <!-- Paragraf Undang-undang -->
        <p class="text-sm text-gray-500 leading-relaxed">
            Berdasarkan Undang-Undang nomor 40 Tahun 2007 tentang Perseroan Terbatas (UUPT) pasal 1 ayat 3, pengertian Tanggung Jawab Sosial dan Lingkungan Perusahaan (TJSLP) atau Corporate Social Responsibility (CSR) adalah komitmen perseroan untuk berperan serta dalam pembangunan ekonomi berkelanjutan guna meningkatkan kualitas kehidupan dan lingkungan yang bermanfaat, baik bagi perseroan sendiri, komunitas setempat, maupun masyarakat pada umumnya.
        </p>
    </div>
</div>

<section class="py-24 bg-gray-50 mt-2 ml-40">
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
            <h2 class="text-2xl font-bold mb-4">Tujuan</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Maksud pemerintah kabupaten dalam Corporate Social Responsibility (CSR) adalah untuk menciptakan sinergi yang kuat antara pemerintah, perusahaan, dan masyarakat. Tujuan utama dari upaya ini adalah untuk mendorong pembangunan berkelanjutan di wilayah kabupaten. Dengan melibatkan perusahaan dalam program CSR, diharapkan dapat tercipta solusi komprehensif bagi berbagai permasalahan sosial dan lingkungan, sehingga kesejahteraan masyarakat dapat meningkat secara signifikan.</p>
        </div>
    </div>
</section>


<div class="bg-white min-h-screen flex items-center justify-center p-8">
    <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-0 bg-gray-50 shadow-lg rounded-lg overflow-hidden">
        <!-- Text Section -->
        <div class="p-12 flex flex-col justify-center">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div> <!-- Garis merah di atas -->
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Manfaat</h2>
            <p class="text-gray-600 mb-6">
                Pemerintah kabupaten memperoleh banyak manfaat dari pelaksanaan CSR. Salah satu manfaat utama adalah percepatan pembangunan di berbagai sektor. Dengan adanya dukungan dana dan sumber daya dari perusahaan, pemerintah dapat lebih cepat mewujudkan program-program pembangunan yang telah direncanakan, seperti pembangunan infrastruktur, peningkatan kualitas pendidikan dan kesehatan, serta pengembangan ekonomi masyarakat.
            </p>
        </div>

        <!-- Image Section -->
        <div class="flex items-center justify-end">
            <img src="{{ asset('manfaat.png') }}" alt="Bupati Kabupaten Cirebon" class="object-cover w-full h-auto">
        </div>
    </div>
</div>

<div class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="w-10 h-1 bg-[#FF5D56] mb-2 mx-auto"></div>
 <!-- Garis merah di atas -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Laporan Program <br> Terbaru</h2>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($reports as $report)
            <!-- Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden relative">
              <a href="{{ route('laporan.detail', $report->id) }}" wire:navigate>
              <img src="{{'storage/' . $report->foto ?? 'https://via.placeholder.com/600x400' }}" alt="report Image"
                  class="w-full h-48 object-cover">
                </a>
              <div class="absolute top-3 left-2 bg-red-600 text-white px-3 py-1 text-xs rounded">
                {{ \Carbon\Carbon::parse($report->laporan_dikirim)->format('d F, Y') }}
              </div>
              <div class="p-4">
                  <h3 class="text-lg font-bold text-gray-800">{{ $report->title }}</h3>
                  <p class="text-gray-600 text-sm mt-2">{{ Str::limit($report->deskripsi, 100) }}</p>
              </div>
          </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-8">
            <a href="/kegiatan" wire:navigate class="border-2 border-gray-300 text-gray-600 hover:text-blue-700 hover:border-blue-700 font-semibold py-2 px-6 rounded">
                Lihat semua kegiatan
            </a>
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

<div class="bg-[#0A1F44] py-16 relative">
    <div class="container mx-auto text-center">
        <!-- Heading -->
        <div class="w-10 h-1 bg-[#FF5D56] mb-2 mx-auto"></div>
        <h2 class="text-white text-3xl font-semibold mb-4">Panduan</h2>
        <p class="text-[#C4C4C4] text-lg mb-12">Bagaimana proses CSR berlangsung</p>

        <!-- Steps -->
        <div class="relative flex justify-center items-center space-x-8">
            <!-- Step 1 -->
            <div class="flex flex-col items-center max-w-xs">
                <div class="bg-[#98100A] text-white rounded-[12px] w-10 h-10 flex items-center justify-center mb-4 z-10">1</div>
                <h3 class="font-semibold text-white">Penyerahan Proposal CSR</h3>
                <p class="text-sm text-[#C4C4C4] mt-2">
                    Pihak penerima menyerahkan proposal terkait CSR kepada Perusahaan yang akan di tuju. Jika perusahaan meminta rekomendasi Bupati Cirebon maka pihak penerima perlu membuat surat permohonan penerbitan surat rekomendasi CSR kepada Bupati dengan melampirkan dokumen proposal kegiatan. </p>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col items-center max-w-xs">
                <div class="bg-[#98100A] text-white rounded-[12px] w-10 h-10 flex items-center justify-center mb-4 z-10">2</div>
                <h3 class="font-semibold text-white">Permohonan Penerbitan Surat CSR</h3>
                <p class="text-sm text-[#C4C4C4] mt-2">
                    Permohonan penerbitan surat rekomendasi CSR yang sudah masuk akan di disposisikan kepada Bagian Perekonomian dan SDA untuk di tindak <br>lanjuti. <br> Setelah Surat rekomendasi CSR di tandatangani Bupati maka pihak penerima perlu mengambil surat tersebut dan menyerahkan nya kepada <br>perusahaan. <br>
                </p>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col items-center max-w-xs">
                <div class="bg-[#98100A] text-white rounded-[12px] w-10 h-10 flex items-center justify-center mb-4 z-10">3</div>
                <h3 class="font-semibold text-white">Laporan CSR</h3>
                <p class="text-sm text-[#C4C4C4] mt-2">
                    Setelah perusahaan menerima surat rekomendasi CSR maka selanjutnya pihak perusahaan berhubungan langsung dengan pihak penerima tanpa ada intervensi dari pemda, di akhir tahun berjalan perusahaan yang mengeluarkan CSR perlu melaporkan penyaluran CSR tersebut kepada Pemda sebagai laporan kepada Bupati.
                </p>
            </div>

            <br>

            <!-- Horizontal Line -->
            <div class="absolute border-t-2 border-gray-400 top-[20px] z-0" style="width: calc(100% - 320px); left: 160px;"></div>
        </div>
        <p class="text-center font-bold text-white">Permohonan Penerbitan Surat Csr</p>

        <!-- Button -->
        <div class="mt-12">
            <a  href="{{ route('pengajuan') }}" wire:navigate class="bg-[#98100A] hover:bg-red-700 text-white font-bold py-2 px-6 rounded">
                Ajukan surat rekomendasi CSR
            </a>
        </div>
    </div>

    <!-- Footer Decoration (Optional) -->
    <div class="absolute bottom-0 right-0 flex items-center justify-end mr-6 mb-6">
        <div class="grid grid-cols-2 gap-2">
            <div class="w-6 h-6 bg-gray-500 opacity-25"></div>
            <div class="w-6 h-6 bg-gray-500 opacity-25"></div>
            <div class="w-6 h-6 bg-gray-500 opacity-25"></div>
            <div class="w-6 h-6 bg-gray-500 opacity-25"></div>
        </div>
    </div>
</div>




</div>
