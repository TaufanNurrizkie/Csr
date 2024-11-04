<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    use HasFactory;

    protected $fillable = ['thumbnail', 'nama', 'deskripsi'];

    protected $table = 'sektors'; // Nama tabel


   // Relasi dengan model Report
   public function reports()
   {
       return $this->hasMany(Report::class, 'sektor_id'); // 'sektor_id' adalah foreign key di tabel reports
   }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }


}
