

<div class="container mx-auto p-6 bg-gray-100">
    <nav class="top-4 left-4 flex items-center space-x-2 text-lg px-3 py-1 rounded my-8">
        <!-- Icon home -->
        <a href="/" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 3.293l6 6V16a1 1 0 01-1 1h-4v-4H9v4H5a1 1 0 01-1-1v-6.707l6-6z"/>
            </svg>
        </a>
        <span class="text-black">›</span>
        <a href="{{ route('mitra.index') }}" class="text-black hover:text-gray-700">Mitra</a>
        <span class="text-black">›</span>
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Detail</span>
    </nav>

    <div class="flex justify-between">
        <div class="w-1/3">
            <div class="w-full h-48 bg-gray-200 rounded-lg mb-4">
                @if($mitra->foto)
                    <img src="{{ asset('storage/' . $mitra->foto) }}" alt="{{ $mitra->nama }}" class="w-full h-full object-cover rounded-lg">
                @endif
            </div>
        </div>

        <div class="w-2/3 ml-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold">{{ $mitra->nama }}
                    @if($mitra->status == 'Aktif')
                        <span class="ml-2 bg-green-100 text-green-600 py-1 px-3 rounded-full text-xs">Terverifikasi</span>
                    @elseif($mitra->status == 'Non-Aktif')
                        <span class="ml-2 bg-yellow-100 text-yellow-600 py-1 px-3 rounded-full text-xs">Pengajuan</span>
                    @endif
                </h2>
                <div>
                    <a href="{{ url('/mitra/'.$mitra->id.'/edit') }}" wire:navigate class="bg-red-500 text-white px-4 py-2 rounded">Ubah Profil</a>
                    @if($mitra->status == 'Non-Aktif')
                        <button onclick="openModal('aktifkan')" class="bg-red-500 text-white px-4 py-2 rounded">Aktifkan Mitra</button>
                    @else
                        <button onclick="openModal('nonaktifkan')" class="bg-gray-200 text-red-500 px-4 py-2 rounded">Non-Aktifkan Mitra</button>
                    @endif
                </div>
            </div>

            <ul class="mb-4">
                <li class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12c2.21 0 4-1.79 4-4s-1.79-4-4-4c-2.21 0-4 1.79-4 4s1.79 4 4 4zm0 0v4m0 4h-4m8 0h-4m8 0h-4m0 0H4m8 0H4"></path>
                    </svg>
                    {{ $mitra->email }}
                </li>
                <li class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 11V7a5 5 0 00-10 0v4a5 5 0 00-1 4v1a4 4 0 003 4h8a4 4 0 003-4v-1a5 5 0 00-1-4zm0 0H7m10 0a5 5 0 01-1 4v1a4 4 0 01-1 3h-8a4 4 0 01-1-3v-1a5 5 0 011-4m10 0v0z"></path>
                    </svg>
                    {{ $mitra->no_telp }}
                </li>
                <li class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2c-1.7 0-3.2.6-4.4 1.8C5.6 5 5 6.5 5 8.2v8.6c0 1.7.6 3.2 1.8 4.4C8.8 22.4 10.3 23 12 23s3.2-.6 4.4-1.8C18.4 19.9 19 18.4 19 16.8V8.2c0-1.7-.6-3.2-1.8-4.4C15.2 2.6 13.7 2 12 2z"></path>
                    </svg>
                    {{ $mitra->alamat }}
                </li>
            </ul>

            <p class="max-h-24 overflow-hidden text-ellipsis">{{ $mitra->deskripsi }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ url('/mitra') }}" wire:navigate class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Kembali Ke Halaman Utama</a>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <div class="flex items-center space-x-4">
                <div class="bg-gray-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m0-4h.01M12 2a10 10 0 11-10 10A10 10 0 0112 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold" id="modal-title">Non-Aktifkan Mitra?</h3>
                    <p class="text-gray-500" id="modal-description">Mitra akan dinonaktifkan sementara, Anda bisa mengaktifkannya kembali.</p>
                </div>
            </div>
            <div class="flex justify-end mt-4 space-x-2">
                <button onclick="closeModal()" class="bg-gray-200 px-4 py-2 rounded">Batal</button>
                <form id="modal-form" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    function openModal(action) {
        const modal = document.getElementById('modal');
        const form = document.getElementById('modal-form');

        if (action === 'aktifkan') {
            document.getElementById('modal-title').innerText = 'Aktifkan Mitra?';
            document.getElementById('modal-description').innerText = 'Mitra akan diaktifkan kembali.';
            form.action = "{{ url('/mitra/'.$mitra->id.'/aktifkan') }}"; // URL untuk mengaktifkan mitra
        } else {
            document.getElementById('modal-title').innerText = 'Non-Aktifkan Mitra?';
            document.getElementById('modal-description').innerText = 'Mitra akan dinonaktifkan sementara, Anda bisa mengaktifkannya kembali.';
            form.action = "{{ url('/mitra/'.$mitra->id.'/nonaktifkan') }}"; // URL untuk menonaktifkan mitra
        }

        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>


