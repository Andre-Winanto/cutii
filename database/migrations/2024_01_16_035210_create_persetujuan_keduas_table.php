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
        Schema::create('persetujuan_keduas', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['tolak', 'setuju'])->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreignId('persetujuan_pertama_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persetujuan_keduas');
    }
};
