<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
