<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'lowongan_id',
        'feedback',
        'status',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class)->withTrashed();
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function interview()
    {
        return $this->hasMany(Interview::class);
    }
}
