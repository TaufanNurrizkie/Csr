@extends('layout')

@section('content')

@vite('resources/css/app.css')

<div class="container mx-auto p-6">
    <div class="bg-white shadow rounded-lg p-6">
        <!-- Judul Proyek -->
        <h1 class="text-3xl font-semibold mb-4">{{ $project->judul }}</h1>

        <!-- Lokasi Proyek -->
        <p class="text-gray-600 mb-2">
            <strong>Lokasi:</strong> {{ $project->lokasi }}
        </p>

        <!-- Jumlah Mitra -->
        <p class="text-gray-600 mb-2">
            <strong>Jumlah Mitra:</strong> {{ $project->jumlah_mitra }}
        </p>

        <!-- Tanggal Mulai -->
        <p class="text-gray-600 mb-2">
            <strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($project->tgl_mulai)->format('d M Y') }}
        </p>

        <!-- Tanggal Akhir -->
        <p class="text-gray-600 mb-2">
            <strong>Tanggal Akhir:</strong> {{ \Carbon\Carbon::parse($project->tgl_akhir)->format('d M Y') }}
        </p>

        <!-- Tanggal Diterbitkan -->
        <p class="text-gray-600 mb-2">
            <strong>Tanggal Diterbitkan:</strong> {{ \Carbon\Carbon::parse($project->tgl_diterbitkai)->format('d M Y') }}
        </p>

        <!-- Status Proyek -->
        <p class="text-gray-600 mb-2">
            <strong>Status:</strong> {{ $project->status }}
        </p>

        <!-- Tombol Terbitkan -->
        <div class="mt-4">
            <a href="{{ route('projects.publish', $project->id) }}" class="flex items-center bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition-colors">
                <img src="{{ asset('images/rocket.png') }}" alt="Roket" class="w-5 h-5 mr-2 transform rotate-12">
                Terbitkan
            </a>
        </div>

        <!-- Deskripsi Proyek -->
        <h2 class="text-xl font-semibold mt-4">Deskripsi Proyek</h2>
        <p class="text-gray-600">{{ $project->deskripsi }}</p>

        <!-- Tombol Kembali -->
        <div class="mt-6">
            <a href="{{ route('projects.index') }}" class="text-red-600 hover:underline">Kembali ke Daftar Proyek</a>
        </div>
    </div>
</div>

@endsection
