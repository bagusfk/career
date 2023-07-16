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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [
                'pemberkasan',
                'test',
                'interview',
                'hired',
                'failed',
                'blacklist'
                ])->default('pemberkasan');
            $table->text('feedback')->nullable();
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
            $table->foreignId('lowongan_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};
