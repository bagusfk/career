<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'cv',
        'transkip',
        'ijazah',
        'profiling',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

}
