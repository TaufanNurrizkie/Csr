<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 container mx-auto"> <!-- Grid wrapper -->
    @foreach($kegiatan as $item)
    <div class="bg-white overflow-hidden hover:shadow-lg transition-shadow duration-300 rounded-lg"> <!-- Membuat card lebih rapi -->
        <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
        <div class="p-4">
            <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">
                {{ \Carbon\Carbon::parse($item->published_date)->format('d M, Y') }}
            </span>
            <h5 class="mt-3 text-xl font-bold">{{ $item->title }}</h5>
            <p class="mt-2 text-gray-600">{{ Str::limit($item->description, 100) }}</p>
        </div>
    </div>
    @endforeach
</div> <!-- Grid wrapper end -->
