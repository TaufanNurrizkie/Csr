@extends('layout')
@section('content')

@vite('resources/css/app.css')

<div class="container mx-auto p-4">
    <nav class=" top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8">
        <!-- Icon home -->
        <a href="/" class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z" fill="black"/>
            </svg>            
        </a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <!-- Kegiatan link -->
 
        <!-- Separator -->
        <span class="text-white">›</span>
        <!-- Detail -->
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Proyek</span>
    </nav>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Proyek</h1>
        <a href="/projects/create" class="bg-red-600 text-white px-4 py-2 rounded">+ Buat Proyek Baru</a>
    </div>

    <!-- Bagian Filter Atas: Semua, Terbit, Draf -->
    <div class="flex justify-between items-center mb-2">
        <div class="flex gap-2">
            <button class="bg-blue-100 text-blue-700 px-4 py-1 rounded">Semua</button>
            <button class="bg-white text-gray-700 border px-4 py-1 rounded">Terbit</button>
            <button class="bg-white text-gray-700 border px-4 py-1 rounded">Draf</button>
        </div>
    </div>

    <!-- Bagian Dropdown dan Tombol -->
    <div class="flex justify-between items-center mb-4">
        <!-- Dropdown Filters -->
        <div class="flex gap-2">
            <!-- Dropdown Tahun -->
            <div class="relative">
                <select class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option selected>2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>
            </div>

            <!-- Dropdown Sektor -->
            <div class="relative">
                <select class="border border-gray-300 text-gray-700 py-1.5 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option selected>Semua Sektor</option>
                    <option value="1">Sektor 1</option>
                    <option value="2">Sektor 2</option>
                </select>
            </div>
        </div>

        <!-- Tombol Filter dan Unduh -->
        <div class="flex gap-2">
            <button class="bg-red-600 text-white py-1.5 px-3 rounded hover:bg-red-700 transition-colors">Terapkan filter</button>
            <button class="border border-green-600 text-green-600 py-1.5 px-3 rounded hover:bg-green-600 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Unduh .csv
            </button>
            <button class="border border-red-600 text-red-600 py-1.5 px-3 rounded hover:bg-red-600 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Unduh .pdf
            </button>
        </div>
    </div>

    <div class="mb-4">
        <input type="text" placeholder="Cari" class="border p-2 rounded w-full" />
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b text-left">Judul</th>
                <th class="px-6 py-3 border-b text-left">Lokasi</th>
                <th class="px-6 py-3 border-b text-left">Jumlah Mitra</th>
                <th class="px-6 py-3 border-b text-left">Tgl Mulai</th>
                <th class="px-6 py-3 border-b text-left">Tgl Akhir</th>
                <th class="px-6 py-3 border-b text-left">Tgl Diterbitkan</th> <!-- Kolom baru -->
                <th class="px-6 py-3 border-b text-left">Status</th>
                <th class="px-6 py-3 border-b text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td class="px-6 py-4 border-b">{{ $project->judul }}</td>
                <td class="px-6 py-4 border-b">{{ $project->lokasi }}</td>
                <td class="px-6 py-4 border-b">{{ $project->jumlah_mitra }}</td>
                <td class="px-6 py-4 border-b">{{ \Carbon\Carbon::parse($project->tgl_mulai)->format('d M Y') }}</td>
                <td class="px-6 py-4 border-b">{{ \Carbon\Carbon::parse($project->tgl_akhir)->format('d M Y') }}</td>
                <td class="px-6 py-4 border-b">{{ \Carbon\Carbon::parse($project->tgl_diterbitkan)->format('d M Y') }}</td> <!-- Tanggal diterbitkan -->
                <td class="px-6 py-4 border-b">
                    <span class="px-2 py-1 text-xs rounded 
                        {{ $project->status === 'Terbit' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $project->status }}
                    </span>
                </td>
                <td class="px-6 py-4 border-b">
                    <a href="{{ route('projects.show', $project->id) }}" class="text-gray-500">👁️</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>

@endsection
