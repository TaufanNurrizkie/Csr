<div>
    <div class="relative">
        <img src="{{ asset('background.png') }}" alt="Activity Image" class="w-full h-64 object-cover">
        
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="absolute inset-0 flex flex-col justify-end p-8">
            <nav class="absolute top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded">
                <!-- Icon home -->
                <a href="/" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z"/>
                    </svg>
                </a>
                <span class="text-white">›</span>
                <a href="{{ route('activities.activity') }}" wire:navigate class="text-white hover:text-gray-700">Kegiatan</a>
                <span class="text-white">›</span>
                <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Detail</span>
            </nav>
            <h2 class="text-white text-2xl font-bold">{{ $activity->title }}</h2>
            <p class="text-white">{{ \Carbon\Carbon::parse($activity->date)->format('F d, Y') }}</p>
            <a href="{{ route('activities.edit', $activity->id) }}" wire:navigate class="absolute top-4 right-4 bg-red-600 text-white px-4 py-2 rounded flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 010 2.828l-9.828 9.828a2 2 0 01-2.828 0L2 10.828l.707-.707L7 11.414V3a1 1 0 011-1h8.414l1.414 1.414a2 2 0 01.586.172zm-1.828.586a1 1 0 00-1.414 0l-8.586 8.586a1 1 0 000 1.414L8 17.828a1 1 0 001.414 0l8.586-8.586a1 1 0 000-1.414l-1.414-1.414z" />
                </svg>
                <span>Ubah Kegiatan</span>
            </a>
        </div>
    </div>

    <div class="px-8 py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <td class="px-6 py-4 border-b max-w-lg break-words whitespace-normal">
                {!! htmlspecialchars_decode($activity->description) !!}
            </td>
            <img src="{{ asset('storage/' . $activity->photo) }}" alt="Activity Image" class="w-full h-64 object-cover">
            <div class="mt-6">Tags : {{ $activity->tags }}</div>
        </div>
    </div>
</div>
