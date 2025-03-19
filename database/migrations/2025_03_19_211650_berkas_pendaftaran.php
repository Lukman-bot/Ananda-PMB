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
        Schema::create('berkas_pendaftaran', function (Blueprint $table) {
            $table->integer('id_berkas_pendaftaran', 11)->autoIncrement();
            $table->integer('id_calon_mahasiswa')->length(11);
            $table->foreign('id_calon_mahasiswa')->references('id_calon_mahasiswa')->on('calon_mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_jenis_berkas')->length(11);
            $table->foreign('id_jenis_berkas')->references('id_jenis_berkas')->on('jenis_berkas')->onUpdate('cascade')->onDelete('cascade');
            $table->text('file_path')->nullable();
            $table->enum('status_verifikasi', ['1', '2', '3'])->nullable()->comment('1 = Pending, 2 = Diterima, 3 = Ditolak');
            $table->text('catatan_verifikasi')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_pendaftaran');
    }
};
