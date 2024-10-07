@extends('layout')
@section('content')
    
@vite('resources/css/app.css')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Kegiatan</h1>
    <div class="flex justify-between mb-4">
        <div class="flex gap-2">
            <button class="bg-blue-100 text-blue-700 px-4 py-1 rounded">Semua</button>
            <button class="bg-white text-gray-700 border px-4 py-1 rounded">Terbit</button>
            <button class="bg-white text-gray-700 border px-4 py-1 rounded">Draf</button>
        </div>
        <button class="bg-red-600 text-white px-4 py-2 rounded">+ Buat Kegiatan Baru</button>
    </div>
    <div class="mb-4">
        <input type="text" placeholder="Cari" class="border p-2 rounded w-full" />
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
                    <img src="{{ $activity->photo }}" alt="Foto" class="w-16 h-16 object-cover rounded">
                </td>
                <td class="px-6 py-4 border-b">{{ $activity->title }}</td>
                <td class="px-6 py-4 border-b">{{ $activity->description }}</td>
                <td class="py-2 px-4">
                    {{ $activity->published_date ? \Carbon\Carbon::parse($activity->published_date)->format('d M Y') : '-' }}
                </td>
                          
                <td class="px-6 py-4 border-b">
                    <span class="px-2 py-1 text-xs rounded 
                        {{ $activity->status === 'Terbit' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $activity->status }}
                    </span>
                </td>
                <td class="px-6 py-4 border-b">
                    <button class="text-blue-500">👁️</button>
                    <a href="{{ route('activities.edit', $activity->id) }}" class="text-gray-500">✏️</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $activities->links() }}
    </div>
</div>
@endsection