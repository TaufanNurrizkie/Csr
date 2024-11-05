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
            @if ($laporan->status === 'revisi')
                <div class="bg-[#FFF6E0] text-[#B54708] border border-[#F79009] rounded-lg p-4 flex items-center mb-6">
                    <img src="{{ asset('warning-icon.png') }}" alt="" class="w-5 h-5 mr-2">
                    <!-- Ganti dengan ikon yang sesuai -->
                    <div>
                        <p class="font-bold">Laporan perlu direvisi</p>
                        <p class="text-sm">Foto tidak sesuai dengan judul dan sektor CSR laporan</p>
                        <!-- Sesuaikan dengan deskripsi revisi dari laporan -->
                    </div>
                </div>
            @endif
            <!-- Bagian label Social -->
            <div>
                <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                {{ $laporan->status === 'approved' ? 'bg-green-100 text-green-700' : ($laporan->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-[#FFF6E0] text-[#B54708]') }}">
                {{ ucfirst($laporan->status) }}
            </span>
                <span class="bg-gray-100 px-2 py-1 rounded-full font-semibold">
                    {{ $laporan->sektor->nama ?? 'Unknown' }}</span>
            </div>

            <!-- Bagian konten utama: ikon, judul, dan tanggal -->
            <div class="flex items-center space-x-2">
                <!-- Icon kotak merah -->
                <img src="{{ asset('lapor.png') }}" alt="" class="w-10 h-10">
                <div class="flex flex-col">
                    <h1 class="font-semibold text-lg">{{ $laporan->title }}</h1>
                    <span
                        class="text-sm font-semibold">{{ \Carbon\Carbon::parse($laporan->created_at)->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Grid Foto -->
        <div class="overflow-x-auto mb-6 px-0 w-full">
            <div class="grid grid-flow-col auto-cols-[minmax(0,1fr)] gap-4">
                @if (!empty($foto))
                    @foreach (json_decode($foto) as $index => $photo)
                        <div class="relative">
                            <img src="{{ Storage::url($photo) }}" alt="Foto yang Diupload"
                                class="w-60 h-50 object-cover rounded-lg shadow">
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

    @if ($laporan->status === 'revisi')
        <div class="flex justify-center mt-5 mb-16">
            <div
                class="flex justify-center w-full max-w-6xl space-x-4 p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <!-- Tombol Revisi -->
                <button   wire:click="hapusLaporan"
                    class="w-1/6 flex items-center justify-center px-4 py-2 border border-[#D0D5DD]  text-black rounded-md hover:bg-gray-200">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2046_2667)">
                            <path
                                d="M14.1665 5.29378H18.3332V6.96045H16.6665V17.7938C16.6665 18.0148 16.5787 18.2268 16.4224 18.383C16.2661 18.5393 16.0542 18.6271 15.8332 18.6271H4.1665C3.94549 18.6271 3.73353 18.5393 3.57725 18.383C3.42097 18.2268 3.33317 18.0148 3.33317 17.7938V6.96045H1.6665V5.29378H5.83317V2.79378C5.83317 2.57277 5.92097 2.36081 6.07725 2.20453C6.23353 2.04825 6.44549 1.96045 6.6665 1.96045H13.3332C13.5542 1.96045 13.7661 2.04825 13.9224 2.20453C14.0787 2.36081 14.1665 2.57277 14.1665 2.79378V5.29378ZM14.9998 6.96045H4.99984V16.9605H14.9998V6.96045ZM7.49984 9.46045H9.1665V14.4605H7.49984V9.46045ZM10.8332 9.46045H12.4998V14.4605H10.8332V9.46045ZM7.49984 3.62712V5.29378H12.4998V3.62712H7.49984Z"
                                fill="#344054" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2046_2667">
                                <rect width="20" height="20" fill="white" transform="translate(0 0.293945)" />
                            </clipPath>
                        </defs>
                    </svg>
                    Hapus
                </button>

                <!-- Tombol Terima -->
                <button  wire:click="revisiLaporan"
                    class="w-1/6 flex items-center justify-center space-x-2 px-4 py-2 bg-[#98100A] text-white rounded-md hover:bg-red-900">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.9998 1.96045L18.3332 5.29378M1.6665 18.6271L2.73017 14.727C2.79957 14.4726 2.83426 14.3453 2.88753 14.2267C2.93482 14.1213 2.99294 14.0212 3.06093 13.9279C3.13752 13.8228 3.23076 13.7295 3.41726 13.543L12.0284 4.93185C12.1934 4.76685 12.2759 4.68434 12.3711 4.65343C12.4548 4.62624 12.5449 4.62624 12.6286 4.65343C12.7237 4.68434 12.8062 4.76685 12.9712 4.93185L15.3618 7.32238C15.5268 7.48739 15.6093 7.56989 15.6402 7.66503C15.6674 7.74871 15.6674 7.83886 15.6402 7.92254C15.6093 8.01768 15.5268 8.10018 15.3618 8.26519L6.75059 16.8764C6.5641 17.0629 6.47085 17.1561 6.36574 17.2327C6.27241 17.3007 6.17227 17.3588 6.06693 17.4061C5.94829 17.4594 5.82107 17.4941 5.56662 17.5634L1.6665 18.6271Z"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Revisi
                </button>
            </div>
        </div>
    @endif
</div>
