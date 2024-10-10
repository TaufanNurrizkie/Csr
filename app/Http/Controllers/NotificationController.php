<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Report;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        // Ambil mitra baru (yang dibuat hari ini)
        $newMitra = Mitra::whereDate('created_at', now()->toDateString())->get();

        // Ambil laporan terbaru yang diterima, ditolak, atau pending (hari ini)
        $newReports = Report::whereIn('status', ['approved', 'rejected', 'pending']) // Status yang diupdate
            ->whereDate('updated_at', now()->toDateString())
            ->get();

        // Kembalikan dalam format JSON
        return response()->json([
            'newMitra' => $newMitra,
            'newReports' => $newReports,
        ]);
    }
}
