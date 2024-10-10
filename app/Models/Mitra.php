<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $fillable = ['foto', 'nama', 'nama_pt', 'email', 'no_telp', 'alamat', 'deskripsi', 'tgl_terdaftar', 'status'];
}
