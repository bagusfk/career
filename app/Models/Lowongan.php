<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Lowongan extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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
