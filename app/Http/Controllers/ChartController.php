<?php

namespace App\Http\Controllers;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartController extends Controller
{
    public function index()
    {
        // Membuat pie chart
        $pieChart = (new LarapexChart)->pieChart()
            ->setTitle('Distribusi Warna')
            ->setDataset([40, 30, 20, 10]) // Set data untuk pie chart
            ->setLabels(['Red', 'Blue', 'Yellow', 'Green']); // Set label untuk pie chart

            
        // Membuat bar chart
        $barChart = (new LarapexChart)->barChart()
        ->setTitle('San Francisco vs Boston.')
        ->setSubtitle('Wins during season 2021.')
        ->setDataset('San Francisco', [6, 9, 3, 4, 10, 8])
        ->setDataset('Boston', [7, 3, 8, 2, 6, 4])
        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
        

        // Mengirimkan data ke view
        return view('admin.dashboard', compact('barChart','pieChart'));
    }
}
