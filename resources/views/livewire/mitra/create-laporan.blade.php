<div class="bg-gray-100 min-h-screen flex flex-col items-start justify-start py-8 px-4 ">
    <nav class="mb-8 flex items-center space-x-2 text-lg px-3 py-1 rounded justify-start ml-32">
        <a href="/mitra/dashboard" wire:navigate class="text-black">
            <img src="{{ asset('home.png') }}" alt="" class="w-10 h-10" >
        </a>
        <span class="text-black">›</span>
        <a href="/mitra/laporan" wire:navigate class="text-black hover:text-gray-700">Laporan</a>
        <span class="text-black">›</span>
        <span class="bg-red-100 text-red-600 px-3 py-1 rounded">Buat Laporan Baru</span>
    </nav>

    <h2 class="text-2xl font-semibold text-gray-900 mb-6 text-left ml-36">Buat Laporan Baru</h2>

    <div class="max-w-5xl w-full mx-auto bg-white shadow-lg rounded-lg p-6 mb-28">
        <form wire:submit.prevent="submit">
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2" for="judul-laporan">Judul Laporan <span class="text-red-500">*</span></label>
                <input id="judul-laporan" type="text" placeholder="Masukan nama laporan CSR" wire:model="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="sektor-csr">Sektor CSR <span class="text-red-500">*</span></label>
                    <select id="sektor-csr" wire:model="sektor_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none bg-gray-100">
                        <option value="" >Pilih Sektor CSR</option>
                        @foreach($sektors as $sektor)
                        <option value="{{ $sektor->id }}" {{ old('sektor_id') == $sektor->id ? 'selected' : '' }}>
                            {{ $sektor->nama }}
                        </option>
                    @endforeach
                    </select>
                    @error('sektor_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="proyek-csr">Nama Proyek CSR</label>
                    <select id="proyek-csr" wire:model="project_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="" >Pilih nama proyek CSR</option>
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->judul }}
                        </option>
                    @endforeach
                    </select>
                    @error('project_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="tanggal">Tanggal <span class="text-red-500">*</span></label>
                    <input id="tanggal" type="number" placeholder="Pilih tanggal" wire:model="tanggal" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('tanggal') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="bulan">Bulan <span class="text-red-500">*</span></label>
                    <input id="bulan" type="number" placeholder="Pilih bulan" wire:model="bulan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('bulan') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="tahun">Tahun <span class="text-red-500">*</span></label>
                    <input id="tahun" type="number" placeholder="Pilih tahun" wire:model="tahun" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('tahun') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="realisasi">Realisasi <span class="text-red-500">*</span></label>
                    <input id="realisasi" type="text" placeholder="Rp 0" wire:model="realisasi" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('realisasi') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2" for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" placeholder="Deskripsi" wire:model="deskripsi" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex space-x-4 overflow-x-auto p-4">
                <!-- Tampilkan gambar yang diupload -->
                @foreach ($foto as $index => $image)
                    <div class="relative w-24 h-24 rounded-lg overflow-hidden border border-gray-300">
                        <img src="{{ $image->temporaryUrl() }}" alt="Uploaded image" class="w-full h-full object-cover">
                        <button type="button" wire:click="removeImage({{ $index }})" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endforeach

                <!-- Input untuk upload gambar baru -->
                <label class="flex flex-col justify-center items-center w-24 h-24 bg-gray-50 border-2 border-dashed rounded-lg cursor-pointer hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 00-1 1v3H6a1 1 0 100 2h3v3a1 1 0 102 0v-3h3a1 1 0 100-2h-3V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-xs text-gray-500 ml-5">Klik untuk unggah</span>
                    <input type="file" class="hidden" wire:model="foto" multiple accept="image/*">
                </label>
            </div>
            @error('foto.*') <span class="text-red-500">{{ $message }}</span> @enderror


            <div class="flex justify-end space-x-4">
                <button type="button" class="flex items-center space-x-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg focus:outline-none">
                    <img src="{{ asset('draft.png') }}" alt="" class="h-5 w-5">
                    <span>Simpan Sebagai Draft</span>
                </button>
                <button type="submit" class="flex items-center space-x-2 px-4 py-2 bg-[#98100A] text-white hover:bg-red-600 rounded-lg focus:outline-none">
                    <img src="{{ asset('submit.png') }}" alt="" class="h-5 w-5">
                    <span>Submit</span>
                </button>
            </div>
        </form>
    </div>
</div>
