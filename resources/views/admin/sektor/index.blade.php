@extends('layout')
@section('content')
    
@vite('resources/css/app.css')

<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Sektor</h1>
        <a href="/sektor/create" class="bg-red-600 text-white px-4 py-2 rounded">+ Tambah Sektor Baru</a>
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
