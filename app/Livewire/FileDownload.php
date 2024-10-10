<?php

namespace App\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class FileDownload extends Component
{
    public function download($type)
    {
        if ($type === 'pdf') {
            $data = ['title' => 'CSR-cirebon PDF']; // Data yang ingin dimasukkan ke dalam PDF

            // Buat PDF
            $pdf = Pdf::loadView('pdf_view', $data); // ganti 'pdf_view' dengan nama view Anda

            // Kembalikan PDF sebagai respons unduhan
            return response()->stream(
                function () use ($pdf) {
                    echo $pdf->output();
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="file.pdf"',
                ]
            );
        } elseif ($type === 'csv') {
            // Logika untuk mengunduh CSV jika diperlukan
            return response()->stream(function () {
                $handle = fopen('php://output', 'w');
                fputcsv($handle, ['Header 1', 'Header 2']); // Ganti dengan data Anda
                fputcsv($handle, ['Data 1', 'Data 2']); // Ganti dengan data Anda
                fclose($handle);
            }, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="file.csv"',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.file-download');
    }
}
