<x-guest-layout>
    <x-nav></x-nav>
    <div class="flex flex-col justify-between h-screen bg-gray-100 overflow-hidden">
        <div class="flex justify-center items-center flex-grow">
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-6xl flex">


                <div class="w-1/2 p-6">
                    <a href="/" wire:navigate class="text-[#98100A] flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 me-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke halaman utama
                    </a>
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang</h1>
                    <p class="text-gray-600 mb-6">Silakan masukan email dan kata sandi untuk masuk ke halaman dashboard Anda</p>

                    <div class="border border-[##D0D5DD] rounded-lg px-3 py-2 inline-block">
                    <p class="text-gray-600">Belum punya akun mitra?
                        <a href="{{ route('register') }}"  class="text-[#98100A] font-semibold">Registrasi di sini</a>
                    </p>
                </div>
                </div>

                <div class="border-l border-[#EAECF0] mx-6 "></div>

                <div class="w-1/2 p-6">
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-semibold">Email *</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 border border-[#EAECF0] rounded-lg focus focus:border-[#98100A] focus:ring-2 focus:ring-[#98100A]" placeholder="Masukan email Anda">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 font-semibold">Kata Sandi *</label>
                            <div class="relative">
                                <input id="password" type="password" name="password" required class="w-full px-4 py-2 border border-[#EAECF0] rounded-lg focus focus:border-[#98100A] focus:ring-2 focus:ring-[#98100A]" placeholder="Masukan kata sandi">
                                <button type="button" class="absolute inset-y-0 right-0 px-3 text-gray-600 focus:outline-none">
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="w-40 py-2 px-4 bg-[#98100A] text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600">
                                Masuk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       <x-footer></x-footer>
    </div>
</x-guest-layout>
