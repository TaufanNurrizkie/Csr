@extends('layout')

@section('content')
@vite('resources/css/app.css')
<script src="https://cdn.tailwindcss.com"></script>
    <h1>Detail Laporan CSR</h1>
    <h2>{{ $report->title }}</h2>
    <p>{{ $report->description }}</p>
    <p>Status: {{ ucfirst($report->status) }}</p>

    @if($report->status == 'pending')
        <form action="{{ route('reports.approve', $report->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Setujui</button>
        </form>

        <form action="{{ route('reports.reject', $report->id) }}" method="POST">
            @csrf
            <textarea name="review_notes" placeholder="Catatan penolakan" required></textarea>
            <button type="submit" class="btn btn-danger">Tolak</button>
        </form>
    @endif

    @if($report->status == 'rejected')
        <h3>Catatan Penolakan:</h3>
        <p>{{ $report->review_notes }}</p>
    @endif
@endsection
