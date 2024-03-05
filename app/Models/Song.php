<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'duration',
        'gender',
        'photo_path',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_song', 'sid', 'uid');
    }

}