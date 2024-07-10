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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('no_surat')->nullable();
            $table->date('tanggal_disahkan')->nullable();
            $table->string('nama')->nullable();
            $table->string('penanda_tangan')->nullable();
            $table->string('nip')->nullable();

            $table->foreignId('persetujuan_kedua_id')
                ->constrained()->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
