<x-guest-layout>
    <x-nav></x-nav>
    <div class="flex flex-col justify-between  bg-gray-100 overflow-hidden">
        <div class="flex justify-center items-center flex-grow mb-10 mt-10"> <!-- Tambahkan mb-4 di sini -->
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-6xl flex">

                {{-- Bagian kiri (pesan selamat datang dan link login) --}}
                <div class="w-1/2 p-6 mt-28">
                    <a href="/" wire:navigate class="text-[#98100A] flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 me-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke halaman utama
                    </a>
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang</h1>
                    <p class="text-gray-600 mb-6">Silakan masukan detail Anda untuk mendaftar akun mitra.</p>

                    <div class="border border-[#D0D5DD] rounded-lg px-3 py-2 inline-block">
                        <p class="text-gray-600">Sudah punya akun mitra?
                            <a href="{{ route('login') }}" wire:navigate class="text-[#98100A] font-semibold">Masuk di sini</a>
                        </p>
                    </div>
                </div>

                <div class="border-l border-[#EAECF0] mx-6 "></div>

                {{-- Bagian kanan (form registrasi) --}}
                <div class="w-1/2 p-6">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Input nama --}}
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-semibold">Nama *</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full px-4 py-2 border-[#EAECF0] rounded-lg focus focus:border-[#98100A] focus:ring-2 focus:ring-[#98100A]" placeholder="Masukan nama Anda">
                        </div>

                        {{-- Input email --}}
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-semibold">Email *</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border-[#EAECF0] rounded-lg focus focus:border-[#98100A] focus:ring-2 focus:ring-[#98100A]" placeholder="Masukan email Anda">
                        </div>

                        {{-- Input password --}}
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 font-semibold">Kata Sandi *</label>
                            <div class="relative">
                                <input id="password" type="password" name="password" required class="w-full px-4 py-2 border-[#EAECF0] rounded-lg focus focus:border-[#98100A] focus:ring-2 focus:ring-[#98100A]" placeholder="Masukan kata sandi">
                                <button type="button" class="absolute inset-y-0 right-0 px-3 text-gray-600 focus:outline-none"></button>
                            </div>
                        </div>

                        {{-- Input konfirmasi password --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700 font-semibold">Konfirmasi Kata Sandi *</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full px-4 py-2 border-[#EAECF0] rounded-lg focus focus:border-[#98100A] focus:ring-2 focus:ring-[#98100A]" placeholder="Konfirmasi kata sandi">
                        </div>

                        <div class="mb-4">
                            {!! htmlFormSnippet() !!}

                            @if ($errors->has('g-recaptcha-response'))

                            <div><small class="text-danger">{{ $errors->has('g-recaptcha-response') }}</small></div>

                            @endif
                        </div>

                        {{-- Tombol registrasi --}}
                        <div class="flex justify-start">
                            <button type="submit" class="w-40 py-2 px-4 bg-[#98100A] text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-guest-layout>
