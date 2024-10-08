<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Jika ada kolom lain yang ingin diisi, sesuaikan bagian ini
    protected $fillable = [
        'judul', 'lokasi', 'jumlah_mitra', 'tgl_mulai', 'tgl_akhir', 'tgl_diterbitkan', 'status'
    ];
}


