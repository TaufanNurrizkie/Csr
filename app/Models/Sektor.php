<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    use HasFactory;

    protected $fillable = ['thumbnail', 'nama', 'deskripsi'];

    protected $table = 'sektors'; // Nama tabel


    public function reports()
    {
        return $this->hasMany(Report::class, 'sektor_id'); // Pastikan 'sektor_id' adalah kolom yang digunakan di tabel 'reports'
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
