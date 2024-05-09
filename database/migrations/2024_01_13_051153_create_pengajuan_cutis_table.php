<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_cutis', function (Blueprint $table) {
            $table->id();
            $table->string('NIP');
            $table->string('nama_kelompok');
            $table->enum('jenis_cuti', ['cuti tahunan', 'cuti besar', 'cuti sakit', 'cuti melahirkan', 'cuti karena alasan penting', 'cuti diluar tanggungan negara']);
            $table->string('alasan');
            $table->date('tanggal_mulai_cuti');
            $table->date('tanggal_akhir_cuti');
            $table->string('alamat_cuti')->nullable();
            $table->string('status')->default('diproses');
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('NIP')
                ->references('NIP')
                ->on('pegawais')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_cutis');
    }
};
