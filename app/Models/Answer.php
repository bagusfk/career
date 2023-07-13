<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'lamaran_id',
        'file_url',
    ];

    public function lamaran()
    {
        return $this->belongsTo(Lamaran::class);
    }
}
