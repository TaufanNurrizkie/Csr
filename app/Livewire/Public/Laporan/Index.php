<?php

namespace App\Livewire\Public\Laporan;

use Livewire\Component;
use App\Models\Laporan;
use App\Models\Report;


class Index extends Component
{
    public $search = '';
    public $perPage = 8;

    public function loadMore()
    {
        // Menambah jumlah laporan yang ditampilkan
        $this->perPage += 8;
    }

    public function render()
    {
        // Mengambil data laporan dari database berdasarkan pencarian
        $laporans = Report::where('title', 'like', '%' . $this->search . '%')
                            ->orderBy('laporan_dikirim', 'desc')
                            ->paginate($this->perPage);
                    

        return view('livewire.public.laporan.index', ['laporans' => $laporans])
               ->layout('components.layouts.public');
    }
}
