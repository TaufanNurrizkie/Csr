<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-8">
        <!-- Breadcrumb Navigation -->
        <nav class="mb-8 flex items-center space-x-2 text-lg px-3 py-1 rounded justify-start ml-12">
            <a href="/mitra/dashboard" wire:navigate class="text-black">
                <img src="{{ asset('home.png') }}" alt="Home" class="w-10 h-10">
            </a>
            <span class="text-black">›</span>
            <a href="/mitra/laporan" wire:navigate class="text-black hover:text-gray-700">Laporan</a>
            <span class="text-black">›</span>
            <span class="bg-red-100 text-[#98100A] px-3 py-1 rounded">Detail</span>
        </nav>

        <h2 class="text-2xl font-semibold text-gray-900 mb-6 text-left ml-16">Detail Laporan</h2>

        <!-- Main Container -->
        <div class="bg-white rounded-lg shadow-md p-6 max-w-6xl mx-auto mb-8">
            <!-- Content inside main container -->
            <div class="flex flex-col space-y-2 text-gray-800 text-sm mb-4 border-b border-[#EAECF0] pb-4">
                <!-- Label Sector -->
                <div>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
        {{ $status === 'approved' ? 'bg-green-100 text-green-700' : ($status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700') }}">
                        {{ ucfirst($status) }}
                    </span>
                    <span
                        class="bg-gray-100 px-2 py-1 rounded-full font-semibold">{{ $report->sektor->nama ?? 'Unknown' }}</span>
                </div>

                <!-- Main Content: Icon, Title, and Date -->
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('lapor.png') }}" alt="Lapor Icon" class="w-10 h-10">
                    <div class="flex flex-col">
                        <h1 class="font-semibold text-lg">{{ $report->title }}</h1>
                        <span class="text-sm font-semibold">{{ $report->mitra->nama_pt }} -
                            {{ \Carbon\Carbon::parse($report->created_at)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Photo Grid -->
            <div class="overflow-x-auto mb-6 px-0 w-full">
                <div class="grid grid-flow-col auto-cols-[minmax(0,1fr)] gap-4">
                    @if (!empty($foto))
                        @foreach (json_decode($foto) as $index => $photo)
                            <div class="relative">
                                <img src="{{ Storage::url($photo) }}" alt="Uploaded Photo"
                                    class="w-60 h-50 object-cover rounded-lg shadow">
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500">Tidak ada foto yang diunggah.</p>
                    @endif
                </div>
            </div>

            <!-- Additional Information Details -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="bg-[#FFF1F0] text-gray-600 rounded-lg p-4 border-l-4 border-[#98100A]">
                    <p class="text-sm font-semibold">Realisasi</p>
                    <p class="text-lg font-bold">Rp {{ number_format($report->realisasi, 0, ',', '.') }}</p>
                </div>
                <div class="bg-[#FFF1F0] text-gray-600 rounded-lg p-4 border-l-4 border-[#98100A]">
                    <p class="text-sm font-semibold">Nama Proyek</p>
                    <p class="text-sm font-bold">{{ $report->project->judul ?? 'Proyek Tidak Diketahui' }}</p>
                </div>
                <div class="bg-[#FFF1F0] text-gray-600 rounded-lg p-4 border-l-4 border-[#98100A]">
                    <p class="text-sm font-semibold">Kecamatan</p>
                    <p class="text-lg font-bold">{{ $report->lokasi }}</p>
                </div>
            </div>

            <!-- Report Details -->
            <div>
                <h2 class="text-lg font-semibold mb-2">Rincian Laporan</h2>
                <p class="text-gray-700 text-sm leading-relaxed">
                    {{ $report->deskripsi ?? 'Deskripsi rincian laporan tidak tersedia.' }}
                </p>
            </div>
        </div>
        
        @if ($status === 'pending')
        <!-- Button Actions Container -->
        <div class="flex justify-center mt-5 mb-16">
            <div
                class="flex justify-center w-full max-w-6xl space-x-4 p-6 bg-white border border-gray-200 rounded-lg shadow-md">

                    <button wire:click="openRejectModal"
                        class="w-1/4 flex items-center justify-center px-4 py-2 border border-red-500 bg-red-100 text-red-700 rounded-md hover:bg-red-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Tolak
                    </button>

                    <!-- Tombol Revisi -->
                    <button wire:click="openReviseModal"
                        class="w-1/4 flex items-center justify-center px-4 py-2 border border-blue-500 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 20.25c4.556 0 8.25-3.694 8.25-8.25S16.556 3.75 12 3.75 3.75 7.444 3.75 12s3.694 8.25 8.25 8.25z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6m0-6l6 6" />
                        </svg>
                        Revisi
                    </button>

                    <!-- Tombol Terima -->
                    <button wire:click="openApproveModal"
                        class="w-1/4 flex items-center justify-center px-4 py-2 bg-[#2C5586] text-white rounded-md hover:bg-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Terima
                    </button>
                @endif
                <!-- Modal Revisi -->
                @if ($isModalOpen)
                    <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
                        <div class="bg-white w-[28rem] rounded-lg shadow-lg p-6">
                            <div class="flex items-center mb-2">
                                <img src="{{ asset('peringatan.png') }}" alt="" class="w-10 h-10">
                            </div>
                            <h3 class="text-lg font-semibold">Revisi</h3>
                            <p class="text-sm text-gray-600 mb-4">Laporan akan diberikan kepada mitra untuk merevisi
                                beberapa hal yang tidak sesuai.</p>

                            <label class="block text-gray-700 text-sm font-bold mb-2">Alasan</label>
                            <textarea wire:model="revisionNotes" placeholder="Masukkan Alasan Revisi"
                                class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:border-blue-500"></textarea>
                            @error('revisionNotes')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="flex justify-between mt-4 space-x-2">
                                <button wire:click="closeReviseModal"
                                    class="w-1/2 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Batal</button>
                                <button wire:click="revise"
                                    class="w-1/2 px-4 py-2 bg-[#98100A] text-white rounded-md hover:bg-red-700">Kirim</button>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Modal Tolak -->
                @if ($isRejectModalOpen)
                    <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
                        <div class="bg-white w-[28rem] rounded-lg shadow-lg p-6">
                            <div class="flex items-center mb-2">
                                <img src="{{ asset('peringatan.png') }}" alt="" class="w-10 h-10">
                            </div>
                            <h3 class="text-lg font-semibold">Tolak Laporan?</h3>
                            <p class="text-sm text-gray-600 mb-4">Laporan akan ditolak dan pihak mitra harus
                                mengirimkan laporan kembali.</p>

                            <label class="block text-gray-700 text-sm font-bold mb-2">Alasan Penolakan</label>
                            <textarea wire:model="reviewNotes" placeholder="Masukkan Alasan Penolakan"
                                class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:border-red-500"></textarea>
                            @error('reviewNotes')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="flex justify-between mt-4 space-x-2">
                                <button wire:click="closeRejectModal"
                                    class="w-1/2 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Batal</button>
                                <button wire:click="reject"
                                    class="w-1/2 px-4 py-2 bg-[#98100A] text-white rounded-md hover:bg-red-700">Tolak</button>
                            </div>
                        </div>
                    </div>
                @endif


                <!-- Modal Terima -->
                @if ($isApproveModalOpen)
                    <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
                        <div class="bg-white w-[28rem] rounded-lg shadow-lg p-6">
                            <div class="flex items-center mb-2">
                                <img src="{{ asset('peringatan.png') }}" alt="" class="w-10 h-10">
                            </div>
                            <h3 class="text-lg font-semibold">Konfirmasi Terima</h3>
                            <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin menerima laporan ini?</p>

                            <div class="flex justify-between mt-4 space-x-2">
                                <button wire:click="closeApproveModal"
                                    class="w-1/2 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Batal</button>
                                <button wire:click="approve"
                                    class="w-1/2 px-4 py-2 bg-[#98100A] text-white rounded-md hover:bg-red-700">Terima</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
