<div class="container mx-auto p-6">

    <nav class="top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded">
        <!-- Icon home -->
        <a href="/dashboard" wire:navigate class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z" fill="black"/>
            </svg>
        </a>
        <span class="text-black">›</span>
        <span class="text-white">›</span>
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Laporan</span>
    </nav>
    <h1 class="text-3xl font-bold mb-6 text-start">Laporan Mitra</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter Section -->
    <div class="flex justify-between mb-6">
        <div class="space-x-4 flex items-center">
            <button wire:click="$set('filters.status', null)" class="bg-blue-500 text-white px-4 py-2 rounded focus:outline-none">Semua</button>
            <button wire:click="$set('filters.status', 'approved')" class="bg-gray-200 text-gray-700 px-4 py-2 rounded focus:outline-none">Diterima</button>
            <button wire:click="$set('filters.status', 'revision')" class="bg-gray-200 text-gray-700 px-4 py-2 rounded focus:outline-none">Revisi</button>
            <button wire:click="$set('filters.status', 'rejected')" class="bg-gray-200 text-gray-700 px-4 py-2 rounded focus:outline-none">Ditolak</button>
        </div>
        <div class="flex space-x-4 items-center">
            <select wire:model="filters.year" class="border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
            </select>

            <select wire:model="filters.quarter" class="border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">Kuartal 2 (April, Mei, Juni)</option>
                <option value="1">Kuartal 1 (Jan, Feb, Mar)</option>
                <option value="3">Kuartal 3 (Jul, Agu, Sep)</option>
                <option value="4">Kuartal 4 (Okt, Nov, Des)</option>
            </select>

            <div>
                <button wire:click="applyFilters" class="bg-red-600 text-white py-1.5 px-3 rounded hover:bg-red-700 transition-colors">Terapkan filter</button>
            </div>

            <!-- Tombol Unduh CSV -->
            <div>
                <button class="border border-green-600 text-green-600 py-1.5 px-3 rounded hover:bg-green-600 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Unduh .csv
                </button>
            </div>

            <!-- Tombol Unduh PDF -->
            <div>
                <button class="border border-red-600 text-red-600 py-1.5 px-3 rounded hover:bg-red-600 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Unduh .pdf
                </button>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="w-full bg-gray-200 text-gray-700">
                    <th class="py-2 px-4">JUDUL LAPORAN</th>
                    <th class="py-2 px-4">MITRA</th>
                    <th class="py-2 px-4">LOKASI</th>
                    <th class="py-2 px-4">REALISASI</th>
                    <th class="py-2 px-4">TGL REALISASI</th>
                    <th class="py-2 px-4">LAPORAN DIKIRIM</th>
                    <th class="py-2 px-4">STATUS</th>
                    <th class="py-2 px-4">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr class="text-center">
                    <td class="py-2 px-4">{{ $report->title }}</td>
                    <td class="py-2 px-4">{{ $report->mitra }}</td>
                    <td class="py-2 px-4">{{ $report->lokasi }}</td>
                    <td class="py-2 px-4">Rp. {{ number_format($report->realisasi, 2, ',', '.') }}</td>
                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($report->tgl_realisasi)->format('d-m-Y') }}</td>
                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($report->laporan_dikirim)->format('d-m-Y') }}</td>
                    <td class="py-2 px-4">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                            {{ $report->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($report->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($report->status) }}
                        </span>
                    </td>
                    <td class="py-2 px-4">
                        <a href="{{ route('reports.show', $report->id) }}" wire:navigate class="text-blue-500 hover:text-blue-600">
                            👁️
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $reports->links() }}
    </div>
</div>