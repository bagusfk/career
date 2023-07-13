<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'lamaran_id',
        'user_id',
        'type',
        'deskripsi',
    ];

    public function lamaran()
    {
        return $this->belongsTo(Lamaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
