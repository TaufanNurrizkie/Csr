@extends('layout')
@section('content')
@vite('resources/css/app.css')

<div class="container mx-auto p-6 bg-gray-100">
    <h2 class="text-2xl font-semibold mb-4">Ubah Profil Mitra</h2>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-100 text-red-700 p-4 rounded">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mitra.update', $mitra->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md space-y-4" novalidate>
        @csrf
        @method('PUT')

        <!-- Dokumen Pendukung -->
        <div class="flex flex-col mb-4">
            <label for="foto" class="block text-gray-700">Dokumen Pendukung *</label>
            <div class="border-dashed border-2 border-gray-300 rounded-lg h-48 flex items-center justify-center cursor-pointer">
                <label for="foto" class="w-full h-full flex items-center justify-center cursor-pointer">
                    <input type="file" id="foto" name="foto" class="hidden" accept="image/*" required>
                    <span class="text-gray-500">Klik untuk unggah atau seret dan lepas kesini (PNG, JPG up to 10MB)</span>
                </label>
            </div>
            @if ($mitra->foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama }}" class="w-32 h-32 object-cover rounded mt-2">
                </div>
            @endif
        </div>

        <!-- Baris Input untuk Nama Mitra dan Nama PT -->
        <div class="flex space-x-4 mb-4">
            <div class="flex-1">
                <label for="nama" class="block text-gray-700">Nama Mitra *</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $mitra->nama) }}" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <div class="flex-1">
                <label for="nama_pt" class="block text-gray-700">Nama PT *</label>
                <input type="text" id="nama_pt" name="nama_pt" value="{{ old('nama_pt', $mitra->nama_pt) }}" class="mt-1 p-2 border rounded w-full" required>
            </div>
        </div>

        <!-- Baris Input untuk Email dan No Telepon -->
        <div class="flex space-x-4 mb-4">
            <div class="flex-1">
                <label for="email" class="block text-gray-700">Email *</label>
                <input type="email" id="email" name="email" value="{{ old('email', $mitra->email) }}" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <div class="flex-1">
                <label for="no_telp" class="block text-gray-700">No Telepon *</label>
                <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $mitra->no_telp) }}" class="mt-1 p-2 border rounded w-full" required>
            </div>
        </div>

        <!-- Baris Input untuk Alamat dan Deskripsi -->
        <div class="flex space-x-4 mb-4">
            <div class="flex-1">
                <label for="alamat" class="block text-gray-700">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4" class="mt-1 p-2 border rounded w-full">{{ old('alamat', $mitra->alamat) }}</textarea>
            </div>

            <div class="flex-1">
                <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 p-2 border rounded w-full">{{ old('deskripsi', $mitra->deskripsi) }}</textarea>
            </div>
        </div>

        <div class="mt-4 flex justify-end">
            <a href="{{ route('mitra.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Kembali</a>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>

@endsection
