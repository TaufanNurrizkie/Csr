<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 container mx-auto"> <!-- Grid wrapper -->
    @foreach($report as $laporan)
    <div class="bg-white overflow-hidden hover:shadow-lg transition-shadow duration-300 rounded-lg">
        <a href="{{ route('laporan.detail', $laporan->id) }}" class="block"> <!-- Membuat card lebih rapi -->
        <img src="{{ asset('storage/' . $laporan->foto) }}" alt="{{ $laporan->title }}" class="w-full h-48 object-cover">
        <div class="p-4">
            <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">
                {{ \Carbon\Carbon::parse($laporan->laporan_dikirim)->format('d M, Y') }}
            </span>
            <h5 class="mt-3 text-xl font-bold">{{ $laporan->title }}</h5>
            <p class="mt-2 text-gray-600">{{ Str::limit($laporan->deskripsi, 100) }}</p>
        </div>
        </a>
    </div>
    @endforeach
</div> <!-- Grid wrapper end -->
