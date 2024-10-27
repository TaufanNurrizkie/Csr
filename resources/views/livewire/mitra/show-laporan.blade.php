<div class="bg-gray-100 p-8 w-full">
    <!-- Breadcrumb Navigation -->
    <nav class="mb-8 flex items-center space-x-2 text-lg px-3 py-1 rounded justify-start ml-12">
        <a href="/mitra/dashboard" wire:navigate class="text-black">
            <img src="{{ asset('home.png') }}" alt="" class="w-10 h-10">
        </a>
        <span class="text-black">›</span>
        <a href="/mitra/laporan" wire:navigate class="text-black hover:text-gray-700">Laporan</a>
        <span class="text-black">›</span>
        <span class="bg-red-100 text-[#98100A] px-3 py-1 rounded">Detail</span>
    </nav>

    <h2 class="text-2xl font-semibold text-gray-900 mb-6 text-left ml-16">Detail Laporan</h2>

    <!-- Container Utama -->
    <div class="bg-white rounded-lg shadow-md p-6 max-w-6xl mx-auto">
        <div class="flex flex-col space-y-2 text-gray-800 text-sm mb-4 border-b border-[#EAECF0] pb-4">
            <!-- Bagian label Social -->
            <div>
                <span class="bg-gray-100 px-2 py-1 rounded-full font-semibold"> {{ $laporan->sektor->nama ?? 'Unknown' }}</span>
            </div>

            <!-- Bagian konten utama: ikon, judul, dan tanggal -->
            <div class="flex items-center space-x-2">
                <!-- Icon kotak merah -->
                <img src="{{ asset('lapor.png') }}" alt="" class="w-10 h-10">
                <div class="flex flex-col">
                    <h1 class="font-semibold text-lg">{{ $laporan->title }}</h1>
                    <span class="text-sm font-semibold">{{ \Carbon\Carbon::parse($laporan->created_at)->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Grid Foto -->
        <div class="overflow-x-auto mb-6 px-0 w-full">
            <div class="grid grid-flow-col auto-cols-[minmax(0,1fr)] gap-4">
                @if (!empty($foto))
                    @foreach (json_decode($foto) as $index => $photo)
                        <div class="relative">
                            <img src="{{ Storage::url($photo) }}" alt="Foto yang Diupload" class="w-60 h-50 object-cover rounded-lg shadow">
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500">Tidak ada foto yang diunggah.</p>
                @endif
            </div>
        </div>


        <!-- Detail Informasi Lainnya -->
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-[#FFF1F0] text-gray-600 rounded-lg p-4 border-l-4 border-[#98100A]">
                <p class="text-sm font-semibold">Realisasi</p>
                <p class="text-lg font-bold">Rp {{ number_format($laporan->realisasi, 0, ',', '.') }}</p>
            </div>
            <div class="bg-[#FFF1F0] text-gray-600 rounded-lg p-4 border-l-4 border-[#98100A]">
                <p class="text-sm font-semibold">Nama Proyek</p>
                <p class="text-sm font-bold">{{ $laporan->project->judul ?? 'Proyek Tidak Diketahui' }}</p>
            </div>
            <div class="bg-[#FFF1F0] text-gray-600 rounded-lg p-4 border-l-4 border-[#98100A]">
                <p class="text-sm font-semibold">Kecamatan</p>
                <p class="text-lg font-bold">{{ $laporan->lokasi }}</p>
            </div>
            <div class="bg-[#FFF1F0] text-gray-600 rounded-lg p-4 border-l-4 border-[#98100A]">
                <p class="text-sm font-semibold">Tanggal Realisasi</p>
                <p class="text-lg font-bold">{{ \Carbon\Carbon::parse($laporan->tgl_realisasi)->format('d F Y') }}</p>
            </div>
        </div>

        <!-- Rincian Laporan -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Rincian Laporan</h2>
            <p class="text-gray-700 text-sm leading-relaxed">
                {{ $laporan->deskripsi ?? 'Deskripsi rincian laporan tidak tersedia.' }}
            </p>
        </div>
    </div>
</div>
