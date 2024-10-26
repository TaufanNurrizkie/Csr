<div class="container mx-auto p-4 mt-10">
    <nav class="top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8">
        <!-- Icon home -->
        <a href="/mitra/dashboard" class="text-white" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z" fill="black"/>
            </svg>
        </a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <!-- Kegiatan link -->
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Laporan</span>
    </nav>

    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-extrabold text-gray-800">Laporan Mitra</h1>
        <a href="/mitra/laporan/create" class="bg-[#98100A] text-white px-4 py-2 rounded hover:bg-red-700">+ Buat Laporan Baru</a>
    </div>

    <!-- Search bar -->
    <div class="mb-4">
        <input type="text" placeholder="Cari" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
               wire:model="search">
    </div>

    <!-- Table -->
    <div class="overflow-x-auto mt-4 rounded">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-white">
                <tr class="text-gray-600">
                    <th class="text-left px-6 py-3 border-b border-gray-300">JUDUL</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">LOKASI</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">REALISASI</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">TGL REALISASI</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">LAPORAN DIKIRIM</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">STATUS</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $report)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200">
                        <td class="px-6 py-4 border-b border-gray-300">{{ $report->title }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $report->lokasi }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $report->realisasi }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $report->tgl_realisasi }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $report->laporan_dikirim }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            @if($report->status == 'Diterima')
                                <span class="px-2 py-1 text-sm bg-green-100 text-green-600 rounded">Diterima</span>
                            @elseif($report->status == 'Revisi')
                                <span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-600 rounded">Revisi</span>
                            @else
                                <span class="px-2 py-1 text-sm bg-gray-100 text-gray-600 rounded">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 text-center">
                            <a href="{{ route('mitra.laporan.show', ['id' => $report->id]) }}" wire:navigate>
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 border-b border-gray-300 text-center">
                            Tidak ada laporan ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
