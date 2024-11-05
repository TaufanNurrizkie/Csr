<?php

namespace App\Models;

use App\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;

    protected $fillable = ['foto', 'nama', 'nama_pt', 'email', 'no_telp', 'alamat', 'deskripsi', 'tgl_terdaftar', 'status', 'user_id'];

    public function reports()
    {
        return $this->hasMany(Report::class, 'mitra_id');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
