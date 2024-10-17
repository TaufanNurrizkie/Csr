<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Jika ada kolom lain yang ingin diisi, sesuaikan bagian ini
    protected $fillable = [
        'judul',
        'lokasi',
        'jumlah_mitra',
        'tgl_mulai',
        'tgl_akhir',
        'tgl_diterbitkan',
        'status'
    ];

    public function mitras()
    {
        return $this->belongsToMany(Mitra::class, 'project_mitra', 'project_id', 'mitra_id');
    }

    // Menghitung jumlah mitra
    public function getJumlahMitraAttribute()
    {
        return $this->mitras()->count();
    }

     // Relasi dengan Report
     public function reports()
     {
         return $this->hasMany(Report::class);
     }

     public function sektor()
     {
         return $this->belongsTo(Sektor::class);
     }
}
