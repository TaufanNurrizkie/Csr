<div class="container mx-auto p-4">
    <nav class=" top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8">
        <!-- Icon home -->
        <a href="/dashboard" class="text-white" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z" fill="black"/>
            </svg>
        </a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <!-- Kegiatan link -->

        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Kegiatan</span>
    </nav>
    <h1 class="text-2xl font-semibold mb-4">Kegiatan</h1>
    <div class="flex justify-between mb-4">
        <div class="flex gap-2">
            <button class="{{ $status === 'all' ? 'bg-[#2C5586] text-white' : 'bg-white text-[#2C5586]' }} border px-4 py-1 rounded-[60px]" wire:click="$set('status', 'all')" data-status="all">Semua</button>
            <button class="{{ $status === 'Terbit' ? 'bg-[#2C5586] text-white' : 'bg-white text-[#2C5586]' }} border px-4 py-1 rounded-[60px]" wire:click="$set('status', 'Terbit')" data-status="Terbit">Terbit</button>
            <button class="{{ $status === 'draft' ? 'bg-[#2C5586] text-white' : 'bg-white text-[#2C5586]' }} border px-4 py-1 rounded-[60px]" wire:click="$set('status', 'draft')" data-status="draft">Draf</button>

        </div>
        <a href="/admin/activities/create" wire:navigate class="bg-red-600 text-white px-4 py-2 rounded">+ Buat Kegiatan Baru</a>
    </div>
    <div class="mb-4 flex items-center justify-between">
        <input type="text" placeholder="Cari" class="border p-2 rounded w-[80%]" wire:model.live="search" />
        <div class="relative  p-2 rounded w-[19%]">
            <button id="dropdownButton" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $sortOrder === 'desc' ? 'TERBARU' : 'TERLAMA' }}
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.44l3.71-4.21a.75.75 0 011.14 1.02l-4.25 4.82a.75.75 0 01-1.14 0l-4.25-4.82a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
            </button>
        
            <div id="dropdownMenu" class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdownButton">
                    <a href="#" wire:click.prevent="setSortOrder('desc')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">TERBARU</a>
                    <a href="#" wire:click.prevent="setSortOrder('asc')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">TERLAMA</a>
                </div>
            </div>
        </div>        
    </div>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b text-left">Foto</th>
                <th class="px-6 py-3 border-b text-left">Judul</th>
                <th class="px-6 py-3 border-b text-left">Deskripsi</th>
                <th class="px-6 py-3 border-b text-left">Tgl Diterbitkan</th>
                <th class="px-6 py-3 border-b text-left">Status</th>
                <th class="px-6 py-3 border-b text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
            <tr>
                <td class="px-6 py-4 border-b">
                    <img src="{{ asset('storage/' . $activity->photo) }}" alt="Foto" class="w-16 h-16 object-cover rounded">
                </td>
                <td class="px-6 py-4 border-b">{{ $activity->title }}</td>
                <td class="px-6 py-4 border-b max-w-lg break-words whitespace-normal">
                    {!! htmlspecialchars_decode($activity->description) !!}
                </td>
                <td class="py-2 px-4">
                    {{ $activity->published_date ? \Carbon\Carbon::parse($activity->published_date)->format('d M Y') : '-' }}
                </td>
                <td class="px-6 py-4 border-b">
                    <span class="px-2 py-1 text-xs rounded
                        {{ $activity->status === 'Terbit' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $activity->status }}
                    </span>
                </td>
                <td class="px-6 py-4 border-b ">
                    <a href="{{ route('activities.show', $activity->id) }}" wire:navigate ><i class="fa-regular fa-eye"></i></a>
                    <a href="{{ route('activities.edit', $activity->id) }}" wire:navigate class="text-gray-500"><i class="fa-solid fa-pen"></i></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $activities->links() }}
    </div>
</div>

<script>
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
  
    dropdownButton.addEventListener('click', () => {
      dropdownMenu.classList.toggle('hidden');
    });
  
    document.addEventListener('click', (event) => {
      if (!dropdownButton.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
      }
    });
  </script>