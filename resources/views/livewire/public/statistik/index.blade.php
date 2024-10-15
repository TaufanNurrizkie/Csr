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
                    <span class="text-[#E66445]">Beranda</span> /
                    <span class="text-white">Statistik</span>
                </p>
                <h1 class="text-7xl font-bold">Statistik</h1>
                <p class="mt-2 text-sm">Program CSR Yang Sudah Berjalan Di Kabupaten Cirebon</p>
            </div>
        </div>
    </div>
    <div class="relative bg-white py-10 px-8">
        <div class="flex flex-col items-center py-4">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div> <!-- Garis merah di atas -->
            <h2 class="text-3xl font-extrabold text-center mb-4">Data Statistik</h2>
        </div>

        <!-- Kotak-kotak image -->
        <img src="{{ asset('dekor2.png') }}" alt="" class="absolute top-0 right-4 w-40 h-40 mt-[-20px] mr-[-20px]"> <!-- Adjust mt and mr as needed -->

        <div class="grid grid-cols-4 gap-6 mb-10">
            <!-- Input Tahun -->
            <div class="col-span-1">
                <div class="relative">
        <!-- Input Tahun dengan jQuery UI Datepicker -->
                <input id="yearPicker" class="border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="Pilih Tahun">
                </div>
            </div>

            <!-- Input Kuartal dengan select -->
            <div class="col-span-2">
                <div class="relative">
                    <select class="border border-gray-300 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
                        <option value="" disabled selected>Pilih Kuartal</option>
                        <option value="Q1">Kuartal 1 (Jan, Feb, Mar)</option>
                        <option value="Q2">Kuartal 2 (Apr, Mei, Jun)</option>
                        <option value="Q3">Kuartal 3 (Jul, Agu, Sep)</option>
                        <option value="Q4">Kuartal 4 (Okt, Nov, Des)</option>
                    </select>
                </div>
            </div>

            <!-- Tombol di Paling Kanan -->
            <div class="flex items-end gap-2 col-span-1">
                <button class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <!-- Icon Download -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V3m0 9l-3-3m3 3l3-3" />
                    </svg>
                    Unduh .csv
                  </button>
                  <button class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <!-- Icon Download -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V3m0 9l-3-3m3 3l3-3" />
                    </svg>
                    Unduh .pdf
                  </button>
            </div>
        </div>

        <div class="container mx-auto px-6 mt-6"> <!-- Menambahkan margin atas pada container ini -->
            <div class="grid grid-cols-4 gap-4 text-left items-center">
                <!-- Kolom 1 -->
                <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
                    <div>
                        <h3 class="text-5xl font-bold text-[#510300] mb-2">124</h3> <!-- Menambahkan margin bawah -->
                        <p class="text-lg font-medium text-gray-800">Total Proyek CSR</p>
                    </div>
                </div>
                <!-- Kolom 2 -->
                <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
                    <div>
                        <h3 class="text-5xl font-bold text-[#510300] mb-2">119</h3> <!-- Menambahkan margin bawah -->
                        <p class="text-lg font-medium text-gray-800">Proyek terealisasi</p>
                    </div>
                </div>
                <!-- Kolom 3 -->
                <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
                    <div>
                        <h3 class="text-5xl font-bold text-[#510300] mb-2">89</h3> <!-- Menambahkan margin bawah -->
                        <p class="text-lg font-medium text-gray-800">Mitra bergabung</p>
                    </div>
                </div>
                <!-- Kolom 4 -->
                <div class="flex items-center border-l-2 border-[#FFC3C0] pl-4">
                    <div>
                        <h3 class="text-5xl font-bold text-[#510300] mb-2">Rp200T +</h3> <!-- Menambahkan margin bawah -->
                        <p class="text-lg font-medium text-gray-800">Dana realisasi CSR</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-white py-10 px-8">
        <div class="flex flex-col flex-start py-4">
            <div class="w-10 h-1 bg-[#FF5D56] mb-2"></div>
            <h2 class="text-3xl font-extrabold mb-4">Realisasi <br> Proyek CSR</h2>
        </div>

     <!-- Chart Section -->
<div class="py-10 px-8">
    <!-- Combined chart rows -->
    <div class="bg-gray-100 py-10 px-8">
        <div class="grid grid-cols-2 gap-8">
            <!-- Pie Chart -->
            <div class="col-span-1 p-6 bg-white rounded-lg shadow">
                <h3 class="font-bold mb-4">Persentase jumlah realisasi proyek per sektor</h3>
                <canvas id="pieChart"></canvas>
            </div>
            <!-- Bar Chart -->
            <div class="col-span-1 p-6 bg-white rounded-lg shadow">
                <h3 class="font-bold mb-4">Total realisasi proyek per sektor</h3>
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-8 mt-8">
            <!-- Mitra Chart -->
            <div class="col-span-1 p-6 bg-white rounded-lg shadow">
                <h3 class="font-bold mb-4">Jumlah realisasi terbanyak berdasarkan mitra</h3>
                <canvas id="mitraChart"></canvas>
            </div>
            <!-- Kecamatan Chart -->
            <div class="col-span-1 p-6 bg-white rounded-lg shadow">
                <h3 class="font-bold mb-4">Jumlah realisasi terbanyak berdasarkan kecamatan</h3>
                <canvas id="kecamatanChart"></canvas>
            </div>
        </div>
    </div>


</div>
<script>
    const data = {
  labels: [
    'Lainnya',
    'Sarana dan prasarana keagmaan',
    'Infrastruktur dan lingkungan',
    'Pendidikan',
    'Kesehatan',
    'Lingkungan',
    'Sosial',
  ],
  datasets: [
    {
      label: 'Total realisasi proyek per sektor',
      data: [
        '###,###,###',
        '###,###,###',
        '###,###,###',
        '###,###,###',
        '###,###,###',
        '###,###,###',
        '###,###,###',
      ],
      backgroundColor: [
        'gold',
        'orangered',
        'firebrick',
        'hotpink',
        'mediumpurple',
        'slategray',
        'dodgerblue',
      ],
      borderColor: [
        'gold',
        'orangered',
        'firebrick',
        'hotpink',
        'mediumpurple',
        'slategray',
        'dodgerblue',
      ],
      borderWidth: 1,
    },
  ],
};

const config = {
  type: 'horizontalBar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          callback: function (value, index, ticks) {
            return 'Rp.' + value;
          },
        },
      },
    },
    plugins: {
      legend: {
        display: false,
      },
      title: {
        display: true,
        text: 'Total realisasi proyek per sektor',
      },
    },
  },
};

const myChart = new Chart(document.getElementById(''), config);
    // Pie Chart
    var pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: @json($pieData)
    });

    // Bar Chart (data dummy)
    var barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Sosial', 'Lingkungan', 'Kesehatan', 'Pendidikan', 'Infrastruktur', 'Keagamaan', 'Lainnya'],
            datasets: [{
                label: 'Total Realisasi',
                data: [500000000, 400000000, 300000000, 200000000, 100000000, 50000000, 250000000],
                backgroundColor: ['#36A2EB', '#8E44AD', '#1ABC9C', '#E74C3C', '#F39C12', '#D35400', '#F1C40F']
            }]
        }
    });

    // Mitra Chart (data dummy)
    var mitraCtx = document.getElementById('mitraChart').getContext('2d');
    new Chart(mitraCtx, {
        type: 'bar',
        data: {
            labels: ['PT A', 'PT B', 'PT C', 'PT D', 'PT E'],
            datasets: [{
                label: 'Realisasi',
                data: [120000000, 100000000, 80000000, 60000000, 40000000],
                backgroundColor: ['#3498DB', '#9B59B6', '#E74C3C', '#1ABC9C', '#F39C12']
            }]
        }
    });

    // Kecamatan Chart (data dummy)
    var kecamatanCtx = document.getElementById('kecamatanChart').getContext('2d');
    new Chart(kecamatanCtx, {
        type: 'bar',
        data: {
            labels: ['Kec. A', 'Kec. B', 'Kec. C', 'Kec. D', 'Kec. E'],
            datasets: [{
                label: 'Realisasi',
                data: [150000000, 130000000, 110000000, 90000000, 70000000],
                backgroundColor: ['#2ECC71', '#E74C3C', '#3498DB', '#F39C12', '#9B59B6']
            }]
        }
    });
</script>

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
