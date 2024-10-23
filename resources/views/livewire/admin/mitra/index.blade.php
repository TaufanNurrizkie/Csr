<div class="container mx-auto p-6 bg-gray-100">
    <nav class=" top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8">
        <a href="/dashboard" class="text-black" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z"/>
            </svg>
        </a>
        <span class="text-black">›</span>
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Mitra</span>
    </nav>
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-semibold mb-4">Mitra</h1>
        <a href="{{ route('mitra.create') }}" wire:navigate class="bg-red-600 text-white px-4 py-2 rounded">+ Tambahkan Mitra Baru</a>
    </div>
    <div class="mb-4">
        <input type="text" placeholder="Cari" class="border p-2 rounded w-full" wire:model.live="search" />
    </div>

    <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
        <thead>
            <tr class="bg-gray-50">
                <th class="py-3 px-6">FOTO</th>
                <th class="py-3 px-6">NAMA</th>
                <th class="py-3 px-6">NAMA PT</th>
                <th class="py-3 px-6">DESKRIPSI</th>
                <th class="py-3 px-6">TGL TERDAFTAR</th>
                <th class="py-3 px-6">STATUS</th>
                <th class="py-3 px-6">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mitras as $mitra)
                <tr class="border-t">
                    <td class="py-3 px-6">
                        <div class="w-16 h-16 bg-gray-200 rounded">
                            @if($mitra->foto)
                                <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama }}" class="w-full h-full object-cover rounded">
                            @endif
                        </div>
                    </td>
                    <td class="py-3 px-6">{{ $mitra->nama }}</td>
                    <td class="py-3 px-6">{{ $mitra->nama_pt }}</td>
                    <td class="px-6 py-4 border-b max-w-lg break-words whitespace-normal">
                        {!! htmlspecialchars_decode(Str::limit($mitra->deskripsi, 250, '...')) !!}
                    </td>
                    <td class="py-2 px-4">
                        {{ $mitra->tgl_terdaftar ? \Carbon\Carbon::parse($mitra->tgl_terdaftar)->format('d M Y') : '-' }}
                    </td>
                    <td class="py-3 px-6">
                        @if($mitra->status == 'Aktif')
                            <span class="bg-green-100 text-green-600 py-1 px-3 rounded-full text-xs">Aktif</span>
                        @else
                            <span class="bg-red-100 text-red-600 py-1 px-3 rounded-full text-xs">Non-Aktif</span>
                        @endif
                    </td>
                    <td class="py-3 px-6">
                        <a href="{{ route('mitra.detail', $mitra->id) }}" wire:navigate >
                            <i class="fa-regular fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 flex justify-between items-center">
        <div>
            <label for="perPage" class="text-sm">Tampilkan Data</label>
            <span>{{ $mitras->firstItem() }}-{{ $mitras->lastItem() }} dari {{ $mitras->total() }} data</span>
        </div>
        <div>
            {{ $mitras->links() }}
        </div>
    </div>
</div>
