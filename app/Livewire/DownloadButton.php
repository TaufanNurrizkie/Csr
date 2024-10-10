<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadButton extends Component
{
    
    public function download($type)
    {
        $filePath = storage_path("app/public/files/sample.{$type}"); // Ganti dengan path file yang sesuai

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        session()->flash('message', 'File tidak ditemukan.');
    }



    public function render()
    {
        return view('livewire.download-button');
    }
}
