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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('NIP')->unique();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('masa_kerja');
            $table->string('nama_kelompok');
            $table->string('golongan');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->date('tahun_mulai_masuk');
            $table->string('ttd');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('nama_kelompok')
                ->references('nama_kelompok')
                ->on('kelompoks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
