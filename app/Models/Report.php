<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'submitted_by',
        'reporter_name',
        'image_url', // Tambahkan ini
        // Kolom lainnya...
    ];

      // Relasi dengan Project
      public function project()
      {
          return $this->belongsTo(Project::class);
      }
      
      // Relasi dengan Mitra
      public function mitra()
      {
          return $this->belongsTo(Mitra::class, 'mitra_id');
      }

      public function sektor()
      {
          return $this->belongsTo(Sektor::class, 'sektor_id'); // Pastikan 'sektor_id' adalah kolom yang digunakan di tabel 'reports'
      }
}

