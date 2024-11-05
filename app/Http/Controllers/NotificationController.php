<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Pengajuan;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        // Ambil peran pengguna yang sedang masuk
        $user = Auth::user();
        $role = $user->getRoleNames()->first(); // Mengambil nama peran pertama

        $newMitra = [];
        $newReports = [];
        $newPengajuan = [];

        // Logika notifikasi berdasarkan peran
        if ($role === 'admin') {
            // Ambil semua mitra baru (yang dibuat hari ini)
            $newMitra = Mitra::whereDate('created_at', now()->toDateString())->get();
            // Ambil semua laporan terbaru
            $newReports = Report::whereIn('status', ['approved', 'rejected', 'pending', 'revisi'])
                ->whereDate('updated_at', now()->toDateString())
                ->get();
            // Ambil semua pengajuan baru
            $newPengajuan = Pengajuan::whereDate('created_at', now()->toDateString())->get();
        } elseif ($role === 'mitra') {
            // Ambil data mitra berdasarkan pengguna yang sedang login
            $mitra = Mitra::where('user_id', $user->id)->first();

            if ($mitra) {
                // Ambil laporan yang terkait dengan mitra ini
                $newReports = Report::where('mitra_id', $mitra->id) // Menggunakan ID mitra
                    ->whereIn('status', ['approved', 'pending', 'revisi'])
                    ->whereDate('updated_at', now()->toDateString())
                    ->get();
            }
        }

        // Kembalikan dalam format JSON
        return response()->json([
            'newMitra' => $newMitra,
            'newReports' => $newReports,
            'newPengajuan' => $newPengajuan
        ]);
    }
}
