<div>
    <div class="max-w-4xl mx-auto my-10 p-6 bg-white rounded-lg shadow-lg border border-gray-300">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Detail Pengajuan</h1>
    
        @if ($pengajuan)
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-lg shadow-md mb-6 border border-blue-200">
                <h2 class="font-semibold text-xl text-blue-600 mb-4 text-center">Nama Lengkap: 
                    <span class="font-normal text-gray-800">{{ $pengajuan->nama_lengkap }}</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <p class="flex items-center text-gray-700 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-6 0l3-3m-3 0h6m-1 8H5a2 2 0 01-2-2V6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2z" />
                        </svg>
                        <strong>Tanggal Lahir:</strong> 
                        <span class="text-gray-600">{{ $pengajuan->tanggal_lahir }}</span>
                    </p>
                    <p class="flex items-center text-gray-700 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <strong>No Handphone:</strong> 
                        <span class="text-gray-600">{{ $pengajuan->no_handphone }}</span>
                    </p>
                    <p class="flex items-center text-gray-700 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-7 5h7" />
                        </svg>
                        <strong>Nama Instansi:</strong> 
                        <span class="text-gray-600">{{ $pengajuan->nama_instansi }}</span>
                    </p>
                    <p class="flex items-center text-gray-700 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <strong>Nama Program:</strong> 
                        <span class="text-gray-600">{{ $pengajuan->nama_program }}</span>
                    </p>
                    <p class="flex items-center text-gray-700 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <strong>Nama Mitra:</strong> 
                        <span class="text-gray-600">{{ $pengajuan->nama_mitra }}</span>
                    </p>
                </div>
                <p class="text-gray-500 mt-4 text-center">Dikirim pada: 
                    <span class="font-semibold">{{ $pengajuan->created_at->format('d-m-Y') }}</span>
                </p>
            </div>
        @else
            <div class="text-center text-gray-500 mb-6">
                <p class="text-lg font-medium">Pengajuan tidak ditemukan.</p>
            </div>
        @endif
    </div>
    
    
    
</div>
