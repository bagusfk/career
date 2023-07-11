<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->char('no_hp')->nullable()->default('');
            $table->text('alamat')->nullable()->default('');
            $table->date('tgl_lahir')->nullable()->default(new DateTime());
            $table->enum('jenis_kelamin', ['laki-laki','perempuan'])->nullable()->default(['']);
            $table->string('image')->nullable()->default('');
            $table->string('sekolah')->nullable()->default('');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
