<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /**
     * Kolom yang bisa diisi (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',   // ID pengguna yang menerima notifikasi
        'title',     // Judul notifikasi
        'message',   // Pesan notifikasi
        'status',    // Status notifikasi ('read', 'unread', dsb.)
    ];

    /**
     * Relasi ke model User.
     * Notifikasi ini berkaitan dengan pengguna (user).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
