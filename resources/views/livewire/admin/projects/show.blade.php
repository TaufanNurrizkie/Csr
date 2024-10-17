<div class="container mx-auto p-6">
    <!-- Breadcrumb Navigation -->
    <nav class=" top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded mb-8">
        <!-- Icon home -->
        <a href="/dashboard" class="text-white" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z" fill="black"/>
            </svg>            
        </a>
        <!-- Separator -->
        <span class="text-black">›</span>
        <span class="text-black-600 px-3 py-1 rounded"><a href="/projects">Detail Proyek</a></span>
        <span class="text-black">›</span>
        <!-- Kegiatan link -->
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Detail Proyek</span>
    </nav>

    <!-- Project Details -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <!-- Status Tag -->
        <div class="flex space-x-2 mb-4">
            <span class="inline-block bg-green-100 text-green-600 text-sm px-2 py-1 rounded">Diterima</span>
            <span class="inline-block bg-gray-100 text-gray-600 text-sm px-2 py-1 rounded">Social</span>
            <span class="inline-block bg-gray-100 text-gray-600 text-sm px-2 py-1 rounded">Rehabilitasi Sosial</span>
        </div>

        <!-- Project Title -->
        <div class="flex items-center mb-6">
            <div class="bg-red-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 11.25a1.5 1.5 0 103 0v-4.5h3a1.5 1.5 0 100-3h-9a1.5 1.5 0 100 3h3v4.5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.75h-3.75l1.5 1.5h-6l1.5-1.5H3"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-semibold text-gray-800 ml-4">{{ $project->judul }}</h1>
        </div>

        <!-- Project Image Grid -->
        <!-- Project Image Grid -->
        <div class="grid grid-cols-{{ $project->photo ? (count(json_decode($project->photo)) > 1 ? '2' : '1') : '1' }} md:grid-cols-{{ $project->photo ? (count(json_decode($project->photo)) >= 4 ? '4' : count(json_decode($project->photo))) : '1' }} gap-4 mb-6">
            @if ($project->photo)
                @foreach (json_decode($project->photo) as $photo)
                    <img src="{{ asset('storage/' . $photo) }}" alt="Project Photo" class="rounded-lg shadow-md w-full h-32 object-cover">
                @endforeach
            @else
                <p class="text-gray-500">Tidak ada foto tersedia.</p>
            @endif
        </div>


        <!-- Date and Location -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-red-50 text-red-600 p-4 rounded">
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($project->tgl_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($project->tgl_akhir)->format('d M Y') }}</p>
            </div>
            <div class="bg-red-50 text-red-600 p-4 rounded">
                <p><strong>Kecamatan:</strong> {{ $project->lokasi }}</p>
            </div>
        </div>

        <!-- Report Section -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800">Rincian Laporan</h2>
            <p class="text-gray-600 mt-2">{{ $project->deskripsi }}</p>
        </div>

        <!-- Publish Button -->
        <div class="mt-4 flex justify-center">
            <a href="{{ route('projects.publish', $project->id) }}" class="flex items-center justify-center bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors w-48 h-12">
                <img src="{{ asset('rocket.png') }}" alt="Roket" class="w-5 h-5 mr-2 transform rotate-12">
                <span class="text-sm">Terbitkan</span>
            </a>
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route('projects.index') }}" wire:navigate class="text-red-600 hover:underline">Kembali ke Daftar Proyek</a>
        </div>
    </div>
</div>
