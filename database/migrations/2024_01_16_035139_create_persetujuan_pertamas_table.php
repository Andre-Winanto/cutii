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
        Schema::create('persetujuan_pertamas', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['', 'setuju', 'tolak'])->nullable();
            $table->string('keterangan')->nullable();

            $table->foreignId('pengajuan_cuti_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persetujuan_pertamas');
    }
};
