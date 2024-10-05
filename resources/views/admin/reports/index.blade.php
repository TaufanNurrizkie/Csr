@extends('layout')

@section('content')
@vite('resources/css/app.css')
<script src="https://cdn.tailwindcss.com"></script>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Daftar Laporan CSR</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter Section -->
    <div class="flex justify-between mb-6 space-x-4">
        <div class="flex space-x-4">
            <select class="border border-gray-300 rounded-md p-2">
                <option value="">Semua Kategori</option>
                <option value="terbaru">Terbaru</option> <!-- Opsi terbaru ditambahkan di sini -->
                <option value="kategori1">Kategori 1</option>
                <option value="kategori2">Kategori 2</option>
                <option value="kategori3">Kategori 3</option>
                <!-- Tambahkan kategori lainnya di sini -->
            </select>

            <select class="border border-gray-300 rounded-md p-2">
                <option value="">Pilih Mitra</option>
                <option value="mitra1">Mitra 1</option>
                <option value="mitra2">Mitra 2</option>
                <option value="mitra3">Mitra 3</option>
                <!-- Tambahkan mitra lainnya di sini -->
            </select>
        </div>

        <div class="flex-grow">
            <input type="text" placeholder="Cari Kegiatan..." class="border border-gray-300 rounded-md p-2 w-full" />
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($reports as $report)
            <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                <!-- Gambar di atas judul -->
                <img src="{{ asset('storage/' . $report->image_url) }}" alt="{{ $report->title }}" class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-lg font-semibold">{{ $report->title }}</h2>
                <p class="text-gray-600 text-sm mb-2">ID: {{ $report->id }}</p>
                <p class="text-gray-600 text-sm mb-2">Pelapor: {{ $report->reporter_name }}</p> <!-- Nama pelapor -->
                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                    {{ $report->status === 'approved' ? 'bg-green-100 text-green-800' : ($report->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                    {{ ucfirst($report->status) }}
                </span>
                <div class="mt-4 text-center">
                    <a href="{{ route('reports.show', $report->id) }}" class="text-blue-500 hover:text-blue-600 font-semibold">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $reports->links('pagination::tailwind') }} <!-- Custom pagination menggunakan Tailwind -->
    </div>
</div>
@endsection
