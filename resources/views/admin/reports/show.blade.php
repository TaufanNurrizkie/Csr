@extends('layout')

@section('content')
@vite('resources/css/app.css')
<script src="https://cdn.tailwindcss.com"></script>

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Detail Laporan CSR</h1>
    <h2 class="text-xl font-semibold">{{ $report->title }}</h2>
    <p class="mb-4">{{ $report->description }}</p>
    <p>Status: {{ ucfirst($report->status) }}</p>

    @if($report->status == 'pending')
        <form action="{{ route('reports.approve', $report->id) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-success">Setujui</button>
        </form>
        
        <form action="{{ route('reports.reject', $report->id) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="review_notes" placeholder="Catatan penolakan" required class="w-full border border-gray-300 p-2 rounded-md"></textarea>
            <button type="submit" class="btn btn-danger">Tolak</button>
        </form>
    @elseif($report->status == 'rejected')
        <h3 class="mt-4 text-red-600 font-semibold">Catatan Penolakan:</h3>
        <p>{{ $report->review_notes }}</p>

        <form action="{{ route('reports.suggest', $report->id) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="suggestion" placeholder="Berikan saran untuk revisi" required class="w-full border border-gray-300 p-2 rounded-md"></textarea>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg mt-2">Kirim Saran</button>
        </form>
    @endif

    @if(session('success'))
        <div class="alert alert-success mt-4">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-4">{{ session('error') }}</div>
    @endif
</div>
@endsection
