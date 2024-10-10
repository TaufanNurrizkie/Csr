<div class="flex gap-5">
    @foreach (['csv' => 'green', 'pdf' => 'red'] as $type => $color)
        <div>
            <button 
                wire:click="download('{{ $type }}')" 
                class="border border-{{ $color }}-600 text-{{ $color }}-600 py-1.5 px-3 rounded hover:bg-{{ $color }}-600 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Unduh .{{ $type }}
            </button>
        </div>
    @endforeach
</div>