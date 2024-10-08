@vite('resources/css/app.css')

@extends('layout')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Buat Proyek Baru</h1>
    <form action="{{ route('projects.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium mb-2">Judul Proyek *</label>
            <input type="text" name="judul" value="{{ old('judul') }}" class="border p-2 rounded w-full @error('judul') border-red-500 @enderror" required>
            @error('judul')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="lokasi" class="block text-sm font-medium mb-2">Lokasi *</label>
            <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="border p-2 rounded w-full @error('lokasi') border-red-500 @enderror" required>
            @error('lokasi')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jumlah_mitra" class="block text-sm font-medium mb-2">Jumlah Mitra *</label>
            <input type="number" name="jumlah_mitra" value="{{ old('jumlah_mitra') }}" class="border p-2 rounded w-full @error('jumlah_mitra') border-red-500 @enderror" required>
            @error('jumlah_mitra')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tgl_mulai" class="block text-sm font-medium mb-2">Tanggal Mulai *</label>
            <input type="date" name="tgl_mulai" value="{{ old('tgl_mulai') }}" class="border p-2 rounded w-full @error('tgl_mulai') border-red-500 @enderror" required>
            @error('tgl_mulai')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tgl_akhir" class="block text-sm font-medium mb-2">Tanggal Akhir *</label>
            <input type="date" name="tgl_akhir" value="{{ old('tgl_akhir') }}" class="border p-2 rounded w-full @error('tgl_akhir') border-red-500 @enderror" required>
            @error('tgl_akhir')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tgl_diterbitkan" class="block text-sm font-medium mb-2">Tanggal Diterbitkan *</label>
            <input type="date" name="tgl_diterbitkan" value="{{ old('tgl_diterbitkai') }}" class="border p-2 rounded w-full @error('tgl_diterbitkan') border-red-500 @enderror" required>
            @error('tgl_diterbitkan')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium mb-2">Status *</label>
            <select name="status" class="border p-2 rounded w-full @error('status') border-red-500 @enderror" required>
                <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                <option value="Terbit" {{ old('status') == 'Terbit' ? 'selected' : '' }}>Terbit</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Buat Proyek
            </button>
            <a href="{{ route('projects.index') }}" class="text-gray-500 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>
@endsection
