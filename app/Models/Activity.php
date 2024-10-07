<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'photo', 'published_at', 'status'];

    // Cast the published_at attribute as a Carbon instance
    protected $casts = [
        'published_at' => 'datetime',
    ];
}
