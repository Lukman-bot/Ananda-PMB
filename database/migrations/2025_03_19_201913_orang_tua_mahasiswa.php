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
        Schema::create('orang_tua_mahasiswa', function (Blueprint $table) {
            $table->integer('id_orang_tua_mahasiswa', 11)->autoIncrement();
            $table->integer('id_calon_mahasiswa')->length(11);
            $table->foreign('id_calon_mahasiswa')->references('id_calon_mahasiswa')->on('calon_mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_ayah', 255);
            $table->string('nama_ibu', 255);
            $table->string('pekerjaan_ayah', 255);
            $table->string('pekerjaan_ibu', 255);
            $table->string('penghasilan_orang_tua', 255);
            $table->tinyInteger('jumlah_saudara');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tua_mahasiswa');
    }
};
