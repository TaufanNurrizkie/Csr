@extends('layout')

@section('content')
@vite('resources/css/app.css')
<script src="https://cdn.tailwindcss.com"></script>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Daftar Laporan CSR</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-lg rounded-lg">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Judul</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $report->id }}</td>
                            <td class="px-4 py-3">{{ $report->title }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $report->status === 'approved' ? 'bg-green-100 text-green-800' : ($report->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($report->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center space-x-2">
                                <a href="{{ route('reports.show', $report->id) }}" class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg">Lihat</a>
                                
                                @if($report->status === 'pending')
                                    <form action="{{ route('reports.approve', $report->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-lg">Setujui</button>
                                    </form>
                                    <form action="{{ route('reports.reject', $report->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg">Tolak</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
