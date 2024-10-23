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
        <div class="space-x-4 flex items-center ">
            <button
                wire:click="setStatusFilter(null)"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-[60px] focus:outline-none focus:text-white focus:bg-[#2C5586]">Semua</button>
            <button
                wire:click="setStatusFilter('approved')"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-[60px] focus:outline-none focus:text-white focus:bg-[#2C5586]">Diterima</button>
            <button
                wire:click="setStatusFilter('revision')"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-[60px] focus:outline-none focus:text-white focus:bg-[#2C5586]">Revisi</button>
            <button
                wire:click="setStatusFilter('rejected')"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-[60px] focus:outline-none focus:text-white focus:bg-[#2C5586]">Ditolak</button>
        </div>


        <div class="flex space-x-4 items-center">
            <select wire:model="year" class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
            </select>

            <select wire:model="filters.quarter" class="border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500" id="quarter">
                <option value="">Semua Kuartal</option>
                <option value="1">Kuartal 1 (Jan, Feb, Mar)</option>
                <option value="2">Kuartal 2 (Apr, Mei, Jun)</option>
                <option value="3">Kuartal 3 (Jul, Agu, Sep)</option>
                <option value="4">Kuartal 4 (Okt, Nov, Des)</option>
            </select>

            <div>
                <button wire:click="applyFilters" class="bg-red-600 text-white py-1.5 px-3 rounded hover:bg-red-700 transition-colors">Terapkan filter</button>
            </div>

            <!-- Tombol Unduh CSV -->
            <div>
                <a href="{{ route('reports.downloadcsv') }}" class="border border-green-600 text-green-600 py-1.5 px-3 rounded hover:bg-green-600 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Unduh .csv
                </a>
            </div>

            <!-- Tombol Unduh PDF -->
            <div>
                <a href="{{ route('reports.downloadpdf') }}" class="border border-red-600 text-red-600 py-1.5 px-3 rounded hover:bg-red-600 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Unduh .pdf
                </a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">JUDUL LAPORAN</th>
                    <th class="py-2 px-4 border-b">MITRA</th>
                    <th class="py-2 px-4 border-b">LOKASI</th>
                    <th class="py-2 px-4 border-b">REALISASI</th>
                    <th class="py-2 px-4 border-b">TGL REALISASI</th>
                    <th class="py-2 px-4 border-b">LAPORAN DIKIRIM</th>
                    <th class="py-2 px-4 border-b">STATUS</th>
                    <th class="py-2 px-4 border-b">AKSI</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-400">
                @foreach($reports as $report)
                <tr class="text-start bg-white">
                    <td class="px-6 py-4 border-b">{{ $report->title }}</td>
                    <td class="px-6 py-4 border-b">{{ $report->mitra }}</td>
                    <td class="px-6 py-4 border-b">{{ $report->lokasi }}</td>
                    <td class="px-6 py-4 border-b">Rp. {{ number_format($report->realisasi, 2, ',', '.') }}</td>
                    <td class="px-6 py-4 border-b">{{ \Carbon\Carbon::parse($report->tgl_realisasi)->format('d-m-Y') }}</td>
                    <td class="px-6 py-4 border-b">{{ \Carbon\Carbon::parse($report->laporan_dikirim)->format('d-m-Y') }}</td>
                    <td class="px-6 py-4 border-b">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                            {{ $report->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($report->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($report->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 border-b">
                        <a href="{{ route('reports.show', $report->id) }}" wire:navigate >
                            <i class="fa-regular fa-eye"></i>
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
