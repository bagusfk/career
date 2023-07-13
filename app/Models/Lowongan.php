<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Lowongan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'judul',
        'deskripsi',
        'posisi',
        'file_test',
        'tgl_open',
        'tgl_closed',
    ];

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }

}
