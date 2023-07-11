<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
    ];
    // no_hp')->nullable();
    //         $table->string('alamat')->nullable();
    //         $table->date('tgl_lahir')->nullable();
    //         $table->enum('jenis_kelamin', ['laki-laki','perempuan'])->nullable();
    //         $table->string('image')->nullable();
    //         $table->string('sekolah
}
