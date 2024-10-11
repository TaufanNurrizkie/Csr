    <div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <nav class="top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded">
            <a href="/dashboard" wire:navigate class="text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z"/>
                </svg>
            </a>
            <span class="text-black">›</span>
            <a href="{{ route('reports.index') }}" wire:navigate class="text-black hover:text-gray-700">Laporan</a>
            <span class="text-black">›</span>
            <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Detail</span>
        </nav>
        <h1 class="text-3xl font-bold">Detail Laporan</h1>
        <img src="{{ asset('storage/' . $report->image_url) }}" alt="{{ $report->title }}" class="w-full h-56 object-cover">

        <div class="p-6">
            <h1 class="text-2xl font-bold mb-2 text-center">{{ $report->title }}</h1>
            <p class="text-gray-700 mb-4 text-justify">{{ $report->description }}</p>

            <div class="mb-4">
                <p class="font-semibold">Mitra: <span class="font-normal">{{ $report->mitra }}</span></p>
                <p class="font-semibold">Lokasi: <span class="font-normal">{{ $report->lokasi }}</span></p>
                <p class="font-semibold">Realisasi: <span class="font-normal">{{ number_format($report->realisasi, 2) }}</span></p>
                <p class="font-semibold">Tanggal Realisasi: <span class="font-normal">{{ \Carbon\Carbon::parse($report->tgl_realisasi)->format('d-m-Y') }}</span></p>
                <p class="font-semibold">Tanggal Laporan Dikirim: <span class="font-normal">{{ \Carbon\Carbon::parse($report->laporan_dikirim)->format('d-m-Y') }}</span></p>
            </div>

            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium">
                    Status:
                    <span class="px-2 py-1 rounded-full text-white
                        {{ $report->status === 'approved' ? 'bg-green-500' : ($report->status === 'rejected' ? 'bg-red-500' : 'bg-yellow-500') }}">
                        {{ ucfirst($report->status) }}
                    </span>
                </span>
                <p class="text-gray-600 text-sm">Pelapor: {{ $report->reporter_name }}</p>
            </div>

            @if($report->status == 'pending')
                <div class="mt-4 flex justify-between gap-4">
                    <form wire:submit.prevent="approve" class="flex-1">
                        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                            Setujui
                        </button>
                    </form>

                    <form wire:submit.prevent="reject" class="flex-1">
                        <textarea wire:model="reviewNotes" placeholder="Catatan penolakan" required class="w-full border border-gray-300 p-2 rounded-md mb-2"></textarea>
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                            Tolak
                        </button>
                    </form>
                </div>
            @elseif($report->status == 'rejected')
                <div class="bg-red-100 p-4 rounded-md">
                    <h3 class="text-red-600 font-semibold">Catatan Penolakan:</h3>
                    <p class="text-red-500 mb-4">{{ $report->review_notes }}</p>
                </div>

                <form wire:submit.prevent="suggest" class="mt-4">
                    <textarea wire:model="suggestion" placeholder="Berikan saran untuk revisi" required class="w-full border border-gray-300 p-2 rounded-md mb-2"></textarea>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                        Kirim Saran
                    </button>
                </form>
            @endif

            @if(session()->has('success'))
                <div class="bg-green-500 text-white px-4 py-3 rounded mb-4 mt-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="bg-red-500 text-white px-4 py-3 rounded mb-4 mt-4">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div> 