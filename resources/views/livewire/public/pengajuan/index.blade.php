<div>

    <div class="hero-section relative w-full h-[450px] overflow-hidden -mt-5"> <!-- -mt-10 untuk menggeser ke atas -->
        <svg width="550" height="450" viewBox="0 0 602 450" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0">
            <rect width="602" height="450" fill="#510300"/>
        </svg>
        <!-- Adjust the size and position of the gray overlay -->

        <div class="absolute inset-0" style="top: 50%; left: 50%;  width: 93%; height: 70%; transform: translate(-50%, -50%);">
            <img src="{{ asset('backgroundPublic.png') }}" alt="Overlay Image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-70"></div>
        </div>
        <div class="absolute inset-0 flex items-center justify-start pl-20" style="top: 50%; transform: translateY(-50%);">
            <div class="relative z-10 text-white text-left flex flex-col ml-20"> <!-- Menambahkan margin kiri -->
                <p class="text-lg">
                    <a href="/" class="text-[#E66445]">Beranda</a> /
                    <a href="{{ route('tentang') }}" wire:navigate class="text-[#E66445]">Tentang</a> /
                    <a class="text-white">Pengajuan</span>
                </p>
                <h1 class="text-7xl font-bold">Pengajuan</h1>
                <p class="mt-2 text-sm">Tentang CSR Kabupaten Cirebon</p>
            </div>
        </div>
    </div>


    <div class="max-w-xl mx-auto my-10">
        <form wire:submit.prevent="submit" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Lengkap *</label>
                <input type="text" wire:model="nama_lengkap" name="nama_lengkap" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Tanggal Lahir *</label>
                <input type="date" wire:model="tanggal_lahir" name="tanggal_lahir" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- No Handphone -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">No Handphone / Whatsapp *</label>
                <input type="text" wire:model="no_handphone" name="no_handphone" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- Nama Instansi -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Instansi / Perseroan *</label>
                <input type="text" wire:model="nama_instansi" name="nama_instansi" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- Nama Program -->
<!-- Nama Program -->
<div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2">Nama Program *</label>
    <select wire:model="nama_program" name="nama_program" class="w-full border border-gray-300 p-2 rounded" required>
        <option value="">Pilih nama program</option>
        @foreach($programs as $program)
            <option value="{{ $program->judul }}">{{ $program->judul }}</option>
        @endforeach
    </select>
</div>

<!-- Nama Mitra -->
<div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2">Nama Mitra *</label>
    <select wire:model="nama_mitra" name="nama_mitra" class="w-full border border-gray-300 p-2 rounded" required>
        <option value="">Pilih mitra</option>
        @foreach($mitras as $mitra)
            <option value="{{ $mitra->nama }}">{{ $mitra->nama }}</option>
        @endforeach
    </select>
</div>


            <!-- Tombol Kirim -->
            <div class="text-right">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Kirim pengajuan</button>
            </div>
        </form>
    </div>


</div>

