<?php

// app/Models/Pengajuan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    protected $fillable = [
        'nama_lengkap',
        'tanggal_lahir',
        'no_handphone',
        'nama_instansi',
        'nama_program',
        'nama_mitra',
    ];
}
