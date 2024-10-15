<?php

namespace App\Livewire\Public\Statistik;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function render()
    {
        // Siapkan data yang diperlukan untuk chart (ini hanya contoh)
        $pieData = [
            'labels' => ['Sosial', 'Lingkungan', 'Kesehatan', 'Pendidikan', 'Infrastruktur', 'Keagamaan', 'Lainnya'],
            'datasets' => [
                [
                    'data' => [245205000, 300000000, 50000000, 400000000, 150000000, 120000000, 80000000],
                    'backgroundColor' => ['#36A2EB', '#8E44AD', '#1ABC9C', '#E74C3C', '#F39C12', '#D35400', '#F1C40F']
                ]
            ]
        ];

        return view('livewire.public.statistik.index', compact('pieData'))->layout('components.layouts.public');
    }
}
