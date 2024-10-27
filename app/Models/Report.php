<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lokasi',
        'realisasi',
        'deskripsi',
        'tgl_realisasi',
        'laporan_dikirim',
        'status',
        'suggestion',
        'mitra_id',
        'sektor_id',
        'project_id',
        'user_id',
        'foto',
        'mitra',
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
          return $this->belongsTo(Sektor::class, 'sektor_id');
      }
}

