<x-action-section>
    <x-slot name="title">
        {{ __('Logout Account') }}  <!-- Ubah judul menjadi Logout Account -->
    </x-slot>

    <x-slot name="description">
        {{ __('Log out of your account.') }}  <!-- Ubah deskripsi menjadi Logout -->
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Are you sure you want to log out of your account?') }}  <!-- Pesan konfirmasi logout -->
        </div>

        <div class="mt-5">
            
            <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-danger-button href="{{ route('logout') }}"
                    @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-danger-button>
                </form>
        </div>

        <!-- Logout Confirmation Modal -->
      

           
    </x-slot>
</x-action-section>
