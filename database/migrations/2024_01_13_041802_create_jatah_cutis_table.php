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
        Schema::create('jatah_cutis', function (Blueprint $table) {
            $table->id();
            $table->string('NIP');
            $table->string('tahun');
            $table->integer('jatah')->default(12);
            $table->timestamps();

            // $table->primary(['NIP', 'tahun']);

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
        Schema::dropIfExists('jatah_cutis');
    }
};
