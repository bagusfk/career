<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'no_hp',
        'alamat',
        'tgl_lahir',
        'jenis_kelamin',
        'image',
        'sekolah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function berkas()
    {
        return $this->hasOne(Berkas::class);
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }

}
