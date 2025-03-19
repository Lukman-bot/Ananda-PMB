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
        Schema::create('pilihan_prodi', function (Blueprint $table) {
            $table->integer('id_pilihan_prodi', 11)->autoIncrement();
            $table->integer('id_calon_mahasiswa')->length(11);
            $table->foreign('id_calon_mahasiswa')->references('id_calon_mahasiswa')->on('calon_mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('pilihan_satu')->length(11);
            $table->foreign('pilihan_satu')->references('id_program_studi')->on('program_studi')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihan_prodi');
    }
};
