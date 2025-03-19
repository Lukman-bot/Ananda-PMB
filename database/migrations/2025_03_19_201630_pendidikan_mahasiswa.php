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
        Schema::create('pendidikan_mahasiswa', function (Blueprint $table) {
            $table->integer('id_pendidikan_mahasiswa', 11)->autoIncrement();
            $table->integer('id_calon_mahasiswa')->length(11);
            $table->foreign('id_calon_mahasiswa')->references('id_calon_mahasiswa')->on('calon_mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('asal_sekolah', 255);
            $table->string('jurusan_sekolah', 255);
            $table->year('tahun_lulus');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_mahasiswa');
    }
};
