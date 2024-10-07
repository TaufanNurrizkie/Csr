@extends('layout')

@section('content')
@vite('resources/css/app.css')
<script src="https://cdn.tailwindcss.com"></script>

<div class="container mx-auto p-6">
    <!-- Card Detail Laporan -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Gambar Utama -->
        <img src="{{ asset('storage/' . $report->image_url) }}" alt="{{ $report->title }}" class="w-full h-56 object-cover">

        <div class="p-6">
            <!-- Judul Laporan -->
            <h1 class="text-2xl font-bold mb-2 text-center">{{ $report->title }}</h1>
            
            <!-- Deskripsi Laporan -->
            <p class="text-gray-700 mb-4 text-justify">{{ $report->description }}</p>

            <!-- Informasi Laporan -->
            <div class="mb-4">
                <p class="font-semibold">Mitra: <span class="font-normal">{{ $report->mitra }}</span></p>
                <p class="font-semibold">Lokasi: <span class="font-normal">{{ $report->lokasi }}</span></p>
                <p class="font-semibold">Realisasi: <span class="font-normal">{{ number_format($report->realisasi, 2) }}</span></p>
                
                <!-- Konversi string ke Carbon -->
                <p class="font-semibold">Tanggal Realisasi: <span class="font-normal">{{ \Carbon\Carbon::parse($report->tgl_realisasi)->format('d-m-Y') }}</span></p>
                <p class="font-semibold">Tanggal Laporan Dikirim: <span class="font-normal">{{ \Carbon\Carbon::parse($report->laporan_dikirim)->format('d-m-Y') }}</span></p>
            </div>

            <!-- Status Laporan -->
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium">
                    Status: 
                    <span class="px-2 py-1 rounded-full text-white
                        {{ $report->status === 'approved' ? 'bg-green-500' : ($report->status === 'rejected' ? 'bg-red-500' : 'bg-yellow-500') }}">
                        {{ ucfirst($report->status) }}
                    </span>
                </span>
                
                <!-- Pelapor -->
                <p class="text-gray-600 text-sm">Pelapor: {{ $report->reporter_name }}</p>
            </div>

            <!-- Tombol untuk Laporan yang Pending -->
            @if($report->status == 'pending')
                <div class="mt-4 flex justify-between gap-4">
                    <!-- Tombol Setujui -->
                    <form action="{{ route('reports.approve', $report->id) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                            Setujui
                        </button>
                    </form>

                    <!-- Tombol Tolak -->
                    <form action="{{ route('reports.reject', $report->id) }}" method="POST" class="flex-1">
                        @csrf
                        <textarea name="review_notes" placeholder="Catatan penolakan" required class="w-full border border-gray-300 p-2 rounded-md mb-2"></textarea>
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

                <!-- Formulir untuk Saran Perbaikan -->
                <form action="{{ route('reports.suggest', $report->id) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="suggestion" placeholder="Berikan saran untuk revisi" required class="w-full border border-gray-300 p-2 rounded-md mb-2"></textarea>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                        Kirim Saran
                    </button>
                </form>
            @endif

            <!-- Pesan Sukses dan Error -->
            @if(session('success'))
                <div class="bg-green-500 text-white px-4 py-3 rounded mb-4 mt-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-500 text-white px-4 py-3 rounded mb-4 mt-4">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
