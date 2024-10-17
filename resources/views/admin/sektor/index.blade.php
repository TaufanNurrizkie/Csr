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
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Sektor</span>
    </nav>  
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Sektor</h1>
        <a href="{{ url('sektors') }}" class="bg-red-600 text-white px-4 py-2 rounded">+ Tambah Sektor Baru</a>
    </div>
    
    <div class="mb-4">
        <input type="text" placeholder="Cari" class="border p-2 rounded w-full" />
    </div>
    
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b text-left">Nama Sektor</th>
                <th class="px-6 py-3 border-b text-left">Deskripsi</th>
                <th class="px-6 py-3 border-b text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sektor as $item)
            <tr>
                <td class="px-6 py-4 border-b">{{ $item->nama }}</td>
                <td class="px-6 py-4 border-b max-w-lg break-words whitespace-normal">
                    {{ htmlspecialchars(strip_tags($item->deskripsi)) }}
                </td>
                <td class="px-6 py-4 border-b">
                    <a href="{{ route('sektor.show', $item->id) }}" class="text-blue-500">👁️</a>
                    <a href="{{ route('sektor.edit', $item->id) }}" class="text-gray-500">✏️</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $sektor->links() }}
    </div>
</div>

@endsection
